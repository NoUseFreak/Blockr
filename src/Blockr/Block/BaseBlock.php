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

abstract class BaseBlock implements BlockInterface
{
    protected $id;

    protected $type = 'block';

    protected $arguments;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    public function getArguments()
    {
        return $this->arguments;
    }

    public function setArgument($name, $value)
    {
        $this->arguments[$name] = $value;
    }

    public function getArgument($name)
    {
        return $this->arguments[$name];
    }

    public function getType()
    {
        return $this->type;
    }

}