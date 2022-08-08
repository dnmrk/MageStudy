<?php

namespace Nineteen02\Customer\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Eav\Setup\EavSetupFactory;

use \Magento\Customer\Setup\CustomerSetup;
use \Magento\Customer\Api\AddressMetadataInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @var \Magento\Eav\Model\Config
     */
    private $eavConfig;

    /**
     * @param \Magento\Customer\Setup\CustomerSetupFactory
     */
    private $customerSetupFactory;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->customerSetupFactory = $customerSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), "1.0.1", "<")) {
            /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
            $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

            $setup->startSetup();

            $eavSetup->removeAttribute(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, 'sample_attribute');

            $setup->endSetup();
        }
        if (version_compare($context->getVersion(), "1.0.3", "<")) {
            /** @var CustomerSetup $customerSetup */
            $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

            $setup->startSetup();

            // insert attribute
            $attributeCode = 'mobile_number';
            $customerSetup->addAttribute(AddressMetadataInterface::ENTITY_TYPE_ADDRESS, $attributeCode,  [
                'label' => 'Mobile Number',
                'type' => 'varchar',
                'input' => 'text',
                'position' => 45,
                'visible' => true,
                'required' => false,
                'system' => 0
            ]);
            
            $myAttribute = $customerSetup->getEavConfig()->getAttribute(AddressMetadataInterface::ENTITY_TYPE_ADDRESS, $attributeCode);
            $myAttribute->setData('used_in_forms', [
                'adminhtml_customer_address',
                'customer_address_edit',
                'customer_register_address'
            ]);

            $myAttribute->getResource()->save($myAttribute);
            
            $setup->endSetup();
        }
    }
}
