<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Tests\Blockr\Media;

use Blockr\Media\Media;

class MediaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Media
     */
    protected $media;

    public function setUp()
    {
        $this->media = new Media();
    }

    public function tearDown()
    {
        unset($this->media);
    }

    public function testAdd()
    {
        $this->media->add('test', 'testValue');

        $this->assertEquals('testValue', $this->media->get('test'));
    }

    public function testAll()
    {
        $this->assertEquals(array(), $this->media->all());

        $this->media->add('test', 'testValue');

        $this->assertEquals(array('test' => 'testValue'), $this->media->all());
    }

    public function testHas()
    {
        $this->media->add('test', 'testValue');

        $this->assertEquals(true, $this->media->has('test'));
        $this->assertEquals(false, $this->media->has('test2'));
    }

    public function testDelete()
    {
        $this->media->add('test', 'testValue');
        $this->media->delete('test');

        $this->assertEquals(false, $this->media->has('test'));
    }
}