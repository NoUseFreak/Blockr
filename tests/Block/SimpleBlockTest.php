<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blockr\Block\Tests;


use Blockr\Block\SimpleBlock;

class SimpleBlockTest extends \PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $block = new SimpleBlock();
        $block->setReponse('test');

        $this->assertEquals('test', $block->getResponse());
    }

    public function testInit()
    {
        $block = new SimpleBlock();

        $this->assertEquals(true, $block->init());
    }
}