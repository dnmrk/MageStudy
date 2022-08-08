<?php
namespace Nineteen02\Customer\Model;

/**
 * Class ExternalLink
 */
class ExternalLink extends \Magento\Framework\Model\AbstractModel implements
    \Nineteen02\Customer\Api\Data\ExternalLinkInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'nineteen02_customer_externallink';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Nineteen02\Customer\Model\ResourceModel\ExternalLink::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
