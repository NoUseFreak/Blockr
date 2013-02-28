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

    public function testQueue()
    {
        $this->assertEquals(new BlockQueue(), $this->manager->getQueue());
    }
}
