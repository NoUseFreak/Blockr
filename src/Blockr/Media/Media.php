<?php
/**
 * This file is part of the Blockr package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Blockr\Media;

class Media
{
    protected $media = array();

    /**
     * Add an item to the media container.
     *
     * @param string $name
     * @param mixed $media
     */
    public function add($name, $media)
    {
        $this->media[$name] = $media;
    }

    /**
     * Get an item from the media container.
     *
     * @param string $name
     * @return mixed|null
     */
    public function get($name)
    {
        return isset($this->media[$name]) ? $this->media[$name] : null;
    }

    /**
     * Delete an item from the media container.
     *
     * @param string $name
     */
    public function delete($name)
    {
        unset($this->media[$name]);
    }

    /**
     * Return all items stored in the media container.
     *
     * @return mixed[]
     */
    public function all()
    {
        return $this->media;
    }

    /**
     * Check if an item exists in the media container.
     *
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return isset($this->media[$name]);
    }
}
