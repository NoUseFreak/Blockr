<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Blockr\Block;

use Blockr\Block\SimpleBlock;

class BlockTest extends \PHPUnit_Framework_TestCase
{
    public function testName()
    {
        $block = new SimpleBlock();
        $block->setName('test');

        $this->assertEquals('test', $block->getName());
    }

    public function testArguments()
    {
        $block = new SimpleBlock();
        $block->setArguments(array('test' => 'testValue'));

        $this->assertEquals(array('test' => 'testValue'), $block->getArguments());
    }

    public function testArgument()
    {
        $block = new SimpleBlock();
        $block->setArgument('test', 'testValue');

        $this->assertEquals('testValue', $block->getArgument('test'));
    }
}