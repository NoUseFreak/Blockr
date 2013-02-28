<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blockr\Block;

class SimpleBlock extends BaseBlock
{
    protected $type = 'block.simple';

    public function init()
    {
        return true;
    }
}