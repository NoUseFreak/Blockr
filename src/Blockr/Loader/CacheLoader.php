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
    public function load($id)
    {
        $this->cacheDriver->fetch($id);
    }

}