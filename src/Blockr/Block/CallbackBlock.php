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

/**
 * Class CallbackBlock
 */
class CallbackBlock extends BaseBlock implements CacheableBlockInterface
{
    /**
     * @var string The type of the block.
     */
    protected $type = 'block.callback';

    /**
     * @var callable The callback to get the response.
     */
    protected $callback;

    /**
     * @var int The time to live.
     */
    protected $ttl = 0;

    /**
     * Set the callback.
     *
     * @param callable $callback
     */
    public function setCallback($callback)
    {
        $this->callback = $callback;
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $this->response = call_user_func($this->callback, $this);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getTtl()
    {
        return $this->ttl;
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheKey()
    {
        if (isset($this->context)) {
            return $this->getId() . md5(serialize($this->getContext()->all()));
        }
        else {
            return $this->getId();
        }
    }
}
