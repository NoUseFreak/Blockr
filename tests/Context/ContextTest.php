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

use Blockr\Context\Context;

class ContextTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Context
     */
    protected $context;

    public function setUp()
    {
        $this->context = new Context();
    }

    public function tearDown()
    {
        unset($this->context);
    }

    public function testAdd()
    {
        $this->context->add('test', 'testValue');

        $values = $this->context->all();
        $this->assertEquals('testValue', $values['test']);
    }

    public function testGet()
    {
        $this->context->add('test', 'testValue');

        $this->assertEquals('testValue', $this->context->get('test'));
    }

    public function testSet()
    {
        $this->context->set(array('test' => 'testValue'));

        $this->assertEquals('testValue', $this->context->get('test'));
    }

    public function testGetDefault()
    {
        $this->assertEquals('testValue', $this->context->get('test', 'testValue'));
    }

    public function testGetException()
    {
        $this->setExpectedException('Exception');

        $this->context->get('test');
    }
}