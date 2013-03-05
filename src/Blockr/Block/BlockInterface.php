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

use Blockr\Context\Context;
use Blockr\Media\Media;

interface BlockInterface
{
    public function getType();

    public function getId();
    public function setId($id);

    public function init();

    public function getResponse();

    /**
     * @return Media
     */
    public function getMedia();

    public function setContext(Context $context);

    /**
     * @return Context
     */
    public function getContext();

}