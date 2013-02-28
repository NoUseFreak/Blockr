<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blockr;

class BlockManager
{
    protected $queue;

    public function getQueue()
    {
        if (is_null($this->queue)) {
            $this->queue = new BlockQueue();
        }
        return $this->queue;
    }
}