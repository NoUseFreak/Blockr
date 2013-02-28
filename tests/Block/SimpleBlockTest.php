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

class SimpleBlockTest extends \PHPUnit_Framework_TestCase
{
    public function testType()
    {
        $block = new SimpleBlock();

        $this->assertEquals('block.simple', $block->getType());
    }

    public function testResponse()
    {
        $block = new SimpleBlock();
        $block->setReponse('test');

        $this->assertEquals(true, $block->init());
        $this->assertEquals('test', $block->getResponse());
    }
}