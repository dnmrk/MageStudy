<?php

namespace Nineteen02\Customer\Setup;

use Magento\Customer\Api\CustomerMetadataInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * @var \Magento\Eav\Model\Config
     */
    private $eavConfig;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $setup->startSetup();

        $attributeCode = 'account_id';
        $eavSetup->addAttribute(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, 'account_id', [
            'label' => 'Account Id',
            'required' => false,
            'user_defined' => 1,
            'system' => 0,
            'position' => 100,
            'input' => 'text'
        ]);

        $eavSetup->addAttributeToSet(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
            null,
            $attributeCode);

        $accountId = $this->eavConfig->getAttribute(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, $attributeCode);
        $accountId->setData('used_in_forms', [
            'adminhtml_customer',
            'customer_account_create',
            'customer_account_edit'
        ]);
        $accountId->getResource()->save($accountId);

        
        $attributeCode = 'amount_spend';
        $eavSetup->addAttribute(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, $attributeCode, [
            'label' => 'Amount Spent',
            'required' => false,
            'user_defined' => 1,
            'system' => 0,
            'position' => 110
        ]);

        $eavSetup->addAttributeToSet(
            CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER,
            CustomerMetadataInterface::ATTRIBUTE_SET_ID_CUSTOMER,
            null,
            $attributeCode);

        $amountSpend = $this->eavConfig->getAttribute(CustomerMetadataInterface::ENTITY_TYPE_CUSTOMER, $attributeCode);
        $amountSpend->setData('used_in_forms', [
            'adminhtml_customer',
            'customer_account_create',
            'customer_account_edit'
        ]);
        $amountSpend->getResource()->save($amountSpend);

        $setup->endSetup();
    }
}