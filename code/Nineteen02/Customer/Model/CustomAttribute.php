<?php

namespace Nineteen02\Customer\Model;

use \Nineteen02\Customer\Api\Data\CustomAttributeInterface;


class CustomAttribute implements CustomAttributeInterface
{
    /** @var  int */
    private $linkId;

    /** @var  int */
    private $productId;

    /** @var  string */
    private $link;

    /**
     * @inheritdoc
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * @inheritdoc
     */
    public function setLinkId($linkId)
    {
        $this->linkId = $linkId;
        return $this->linkId;
    }

    /**
     * @inheritdoc
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @inheritdoc
     */
    public function setProductId($id)
    {
        $this->productId = $id;
        return $this; 
    }

    /**
     * @inheritdoc
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @inheritdoc
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }
}
