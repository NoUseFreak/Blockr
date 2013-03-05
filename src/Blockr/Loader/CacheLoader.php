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
use Doctrine\Common\Cache\Cache;

class CacheLoader implements LoaderInterface
{
    protected $cacheDriver;

    public function __construct(Cache $cacheDriver)
    {
        $this->cacheDriver = $cacheDriver;
    }

    /**
     * {@inheritdoc}
     */
    public function fetch($id)
    {
        return $this->cacheDriver->fetch($id);
    }

    public function save(CacheableBlockInterface $block)
    {
        return $this->cacheDriver->save($block->getCacheKey() ,$block, $block->getTtl());
    }
}
