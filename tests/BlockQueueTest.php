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

use Blockr\Block\CallbackBlock;
use Blockr\Block\SimpleBlock;
use Blockr\BlockQueue;

class BlockQueueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BlockQueue
     */
    protected $queue;

    public function setUp()
    {
        $this->queue = new BlockQueue();
    }

    public function tearDown()
    {
        unset($this->queue);
    }

    public function testInsertOrder()
    {
        $blocks = array(
            1 => new SimpleBlock(),
            2 => new CallbackBlock(),
        );

        foreach ($blocks as $block) {
            $this->queue->insert($block);
        }

        $index = 1;
        foreach ($this->queue as $block) {
            $this->assertEquals($blocks[$index], $block);
            $index++;
        }
    }

    public function testPriority()
    {
        $blocks = array(
            1 => new SimpleBlock(),
            2 => new CallbackBlock(),
        );

        foreach ($blocks as $priority => $block) {
            $this->queue->insert($block, $priority);
        }

        $index = 2;
        foreach ($this->queue as $block) {
            $this->assertEquals($blocks[$index], $block);
            $index--;
        }
    }

    public function testException()
    {
        $this->setExpectedException('InvalidArgumentException');

        $this->queue->insert('string');
    }
}
