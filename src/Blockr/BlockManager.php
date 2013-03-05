<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blockr;

use Blockr\Block\BlockInterface;
use Blockr\Block\CacheableBlockInterface;
use Blockr\Context\Context;
use Blockr\Loader\LoaderInterface;

class BlockManager
{
    /**
     * @var \SplObjectStorage
     */
    protected $blocks;

    /**
     * @var array Holds the mapping between the objects and the block identifiers.
     */
    protected $blockHashes = array();

    /**
     * @var LoaderInterface
     */
    protected $loader;

    /**
     * @var Context
     */
    protected $context;

    /**
     * Construct all containers.
     */
    public function __construct(LoaderInterface $loader, Context $context)
    {
        $this->blocks = new \SplObjectStorage();
        $this->loader = $loader;
        $this->context = $context;
    }

    /**
     * Add a block to the manager.
     *
     * @param Block\BlockInterface $block
     * @param int $priority
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function add(BlockInterface $block, $priority = 0)
    {
        if (!$block->getId()) {
            throw new \Exception('Can\'t add a block without identifier.');
        }

        $this->blocks->attach($block, array(
            'priority' => $priority,
        ));
        $this->blockHashes[$block->getId()] = $block;

        return true;
    }

    /**
     * Check if a block is present for this identifier.
     *
     * @param string|int $id
     *
     * @return bool
     */
    public function hasId($id)
    {
        return isset($this->blockHashes[$id]);
    }

    /**
     * Check if a block is in the manager.
     *
     * @param Block\BlockInterface $block
     *
     * @return bool
     */
    public function has(BlockInterface $block)
    {
        return in_array($block, $this->blockHashes);
    }

    /**
     * Remove a block giving the identifier.
     *
     * @param string|int $id
     */
    public function removeById($id)
    {
        $this->blocks->detach($this->blockHashes[$id]);
        unset($this->blockHashes[$id]);
    }

    /**
     * Remove a block from the manager.
     *
     * @param Block\BlockInterface $block
     */
    public function remove(BlockInterface $block)
    {
        $this->blocks->detach($block);
        unset($this->blockHashes[array_search($block, $this->blockHashes)]);
    }

    /**
     * Get a block by a given identifier.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getById($id)
    {
        return $this->blockHashes[$id];
    }

    /**
     *
     */
    public function build()
    {
        $blocks = array();

        foreach ($this->blocks as $block) {

            $block->setContext($this->context);
            if ($block instanceof CacheableBlockInterface) {
                $block = $this->loader->fetch($block->getCacheKey());
            }
            else {
                $block->init();
            }
            $blocks[] = $block;
        }

        return $blocks;
    }
}