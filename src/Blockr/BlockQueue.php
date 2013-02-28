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

use Blockr\Block\BlockInterface;

class BlockQueue extends \SplPriorityQueue
{
    protected $serial = PHP_INT_MAX;

    public function insert(BlockInterface $value, $priority = 0)
    {
        parent::insert($value, array($priority, $this->serial--));
    }
}