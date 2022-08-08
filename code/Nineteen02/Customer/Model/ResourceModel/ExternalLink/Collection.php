<?php
namespace Nineteen02\Customer\Model\ResourceModel\ExternalLink;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(
            \Nineteen02\Customer\Model\ExternalLink::class,
            \Nineteen02\Customer\Model\ResourceModel\ExternalLink::class
        );
    }
}
