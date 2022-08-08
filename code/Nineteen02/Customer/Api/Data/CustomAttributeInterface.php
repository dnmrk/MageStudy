<?php

namespace Nineteen02\Customer\Api\Data;

interface CustomAttributeInterface 
{
    /**
     * Retrieve Provider link
     *
     * @return string
     */
    public function getLink();

    /**
     * Set Provider link
     *
     * @param string $link
     * @return self
     */
    public function setLink($link);

    /**
     * Set Product Id for further updates
     *
     * @param int $id
     * @return self
     */
    public function setProductId($id);

    /**
     * Retrieve product id
     *
     * @return int
     */
    public function getProductId();

    /**
     * @return int
     */
    public function getLinkId();

    /**
     * @param int $linkId
     * @return self
     */
    public function setLinkId($linkId);
}
