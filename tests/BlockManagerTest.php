<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Blockr;

use Blockr\Block\SimpleBlock;
use Blockr\BlockManager;
use Blockr\BlockQueue;

class BlockManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BlockManager
     */
    protected $manager;

    public function setUp()
    {
        $this->manager = new BlockManager();
    }

    public function tearDown()
    {
        unset($this->manager);
    }

    public function testAddException()
    {
        $this->setExpectedException('Exception');

        $block = new SimpleBlock();
        $this->manager->add($block);
    }

    public function testAdd()
    {
        $block = new SimpleBlock();
        $block->setId('test');

        $this->assertEquals(true, $this->manager->add($block));
    }

    public function testGet()
    {
        $block = new SimpleBlock();
        $block->setId('test');

        $this->manager->add($block);

        $this->assertEquals($block, $this->manager->getById('test'));
    }

    public function testHasId()
    {
        $block = new SimpleBlock();
        $block->setId('test');

        $this->manager->add($block);

        $this->assertEquals(true, $this->manager->hasId('test'));
        $this->assertEquals(false, $this->manager->hasId('test2'));
    }

    public function testRemoveById()
    {
        $block = new SimpleBlock();
        $block->setId('test');

        $this->manager->add($block);

        $this->assertEquals($block, $this->manager->getById('test'));
    }

    public function testHas()
    {
        $block = new SimpleBlock();
        $block->setId('test');
        $block2 = new SimpleBlock();
        $block2->setId('test2');

        $this->manager->add($block);

        $this->assertEquals(true, $this->manager->has($block));
        $this->assertEquals(false, $this->manager->has($block2));
    }

    public function testRemove()
    {
        $block = new SimpleBlock();
        $block->setId('test');

        $this->manager->add($block);
        $this->manager->remove($block);

        $this->assertEquals(false, $this->manager->has($block));
    }

    public function testRemoveId()
    {
        $block = new SimpleBlock();
        $block->setId('test');

        $this->manager->add($block);
        $this->manager->removeById('test');

        $this->assertEquals(false, $this->manager->has($block));
    }

}
