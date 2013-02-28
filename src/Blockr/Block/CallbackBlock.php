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

class CallbackBlock extends BaseBlock
{
    protected $type = 'block.callback';

    protected $response;

    protected $callback;

    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function init()
    {
        $this->response = call_user_func($this->callback, $this);
        return true;
    }
}