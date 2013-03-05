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


use Blockr\Block\CallbackBlock;
use Blockr\Context\Context;

class CallbackBlockTest extends \PHPUnit_Framework_TestCase
{
    public function testType()
    {
        $block = new CallbackBlock();

        $this->assertEquals('block.callback', $block->getType());
    }

    public function testResponse()
    {
        $block = new CallbackBlock();
        $block->setCallback(function() {
            return 'test';
        });

        $this->assertEquals(true, $block->init());
        $this->assertEquals('test', $block->getResponse());
    }

    public function testCacheContext()
    {
        $block1 = new CallbackBlock();
        $block1->setContext(new Context());

        $block2 = new CallbackBlock();
        $context = new Context();
        $context->add('test', 'value');
        $block2->setContext($context);

        $this->assertNotEquals($block1->getCacheKey(), $block2->getCacheKey());
        $this->assertEquals($block1->getCacheKey(), $block1->getCacheKey());
    }

}