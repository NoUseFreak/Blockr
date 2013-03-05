<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Tests\Blockr\Context;

use Blockr\Block\CallbackBlock;
use Blockr\Block\SimpleBlock;
use Blockr\Context\Context;
use Blockr\Loader\CacheLoader;
use Doctrine\Common\Cache\ArrayCache;

class CacheLoaderTest extends \PHPUnit_Framework_TestCase
{
    public function testCacheLoader()
    {
        $cache = new ArrayCache();
        new CacheLoader($cache);
    }

    public function testSave()
    {
        $cache = new ArrayCache();

        $block = new CallbackBlock();
        $block->setId('key');

        $loader = new CacheLoader($cache);
        $this->assertTrue($loader->save($block));
    }

    public function testFetch()
    {
        $cache = new ArrayCache();

        $block = new CallbackBlock();
        $block->setId('key');

        $loader = new CacheLoader($cache);
        $loader->save($block);

        $this->assertEquals($block, $loader->fetch('key'));
    }
}