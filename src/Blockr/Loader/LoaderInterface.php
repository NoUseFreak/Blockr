<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blockr\Loader;

use Blockr\Block\BlockInterface;
use Blockr\Block\CacheableBlockInterface;

interface LoaderInterface
{
    /**
     * Load the block for the given identifier.
     * Return false if the block could not be loaded.
     *
     * @param $id
     *
     * @return BlockInterface
     */
    public function fetch($id);

    /**
     * Save the block to the cache.
     *
     * @param $id
     * @param \Blockr\Block\CacheableBlockInterface $block
     *
     * @return mixed
     */
    public function save(CacheableBlockInterface $block);
}