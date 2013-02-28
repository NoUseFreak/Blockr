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
use Symfony\Component\HttpFoundation\Response;

abstract class BaseBlock implements BlockInterface
{
    /**
     * @var string|int The blocks identifier.
     */
    protected $id;

    /**
     * @var string The type of the block.
     */
    protected $type = 'block';

    /**
     * @var Context The context of the block.
     */
    protected $context;

    /**
     * @var \Symfony\Component\HttpFoundation\Response
     */
    protected $response;

    /**
     * Set the block's identifier.
     *
     * @param string|int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the block's identifier
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the block's type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Context $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
