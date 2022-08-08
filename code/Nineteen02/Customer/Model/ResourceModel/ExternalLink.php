<?php
namespace Nineteen02\Customer\Model\ResourceModel;

/**
 * Class ExternalLink
 */
class ExternalLink extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('nineteen02_customer_externallink', 'externallink_id');
    }
}
