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
use Blockr\Context\Context;
use Symfony\Component\HttpFoundation\Response;

class BlockTest extends \PHPUnit_Framework_TestCase
{
    public function testId()
    {
        $block = new SimpleBlock();
        $block->setId('test');

        $this->assertEquals('test', $block->getId());
    }

    public function testContext()
    {
        $block = new SimpleBlock();
        $block->setContext(new Context());

        $this->assertEquals(new Context(), $block->getContext());
    }

    public function testResponse()
    {
        $block = new SimpleBlock();
        $block->setResponse(new Response());

        $this->assertEquals(new Response(), $block->getResponse());
    }

    public function testInit()
    {
        $block = new SimpleBlock();

        $this->assertEquals(true, $block->init());
    }
}