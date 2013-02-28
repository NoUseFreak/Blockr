<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Blockr\Context;

/**
 * Class Context
 */
class Context
{
    /**
     * @var array Holds all context.
     */
    protected $context = array();

    /**
     * Add some context.
     *
     * @param string $name The name of the item.
     * @param mixed $value
     */
    public function add($name, $value)
    {
        $this->context[$name] = $value;
    }

    /**
     * Check if the context contains a certain item.
     *
     * @param string $name The name of the item.
     * @return bool
     */
    public function has($name)
    {
        return isset($this->context[$name]);
    }

    /**
     * Overwrite all context.
     *
     * @param $context
     */
    public function set($context)
    {
        $this->context = $context;
    }

    /**
     * Get all context items.
     *
     * @return array
     */
    public function all()
    {
        return $this->context;
    }

    /**
     * Get an item from the context.
     *
     * @param string $name The name of the item.
     * @param mixed $default optional The value to return if the item is not present.
     *
     * @return mixed
     * @throws \Exception
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $this->context[$name];
        }
        if (func_num_args() == 2) {
            return func_get_arg(1);
        }
        throw new \Exception('Context not found');
    }
}
