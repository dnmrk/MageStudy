<?php

namespace Nineteen02\Customer\Setup;

/**
 * Class UpgradeSchema
 */
class UpgradeSchema implements \Magento\Framework\Setup\UpgradeSchemaInterface
{
    public function upgrade(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();
        //START: install stuff
        //END:   install stuff

        if (version_compare($context->getVersion(), "1.0.2", "<")) {
            //START table setup
            $table = $installer->getConnection()->newTable(
                $installer->getTable('nineteen02_customer_externallink')
            )->addColumn(
                'link_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true],
                'Entity ID'
            )->addColumn(
                'customer_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['nullable' => false],
                'Customer ID'
            )->addColumn(
                'link',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                1000,
                ['nullable' => false],
                'link'
            )->addColumn(
                'creation_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Creation Time'
            )->addColumn(
                'update_time',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                'Modification Time'
            )->addColumn(
                'is_active',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['nullable' => false, 'default' => '1'],
                'Is Active'
            );
            $installer->getConnection()->createTable($table);
        }
        //END   table setup
        $installer->endSetup();
    }
}
