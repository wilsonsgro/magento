<?php

namespace Reply\Example\Setup;

use Reply\Example\Api\Data\ReplyInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
            $tableName = $installer->getTable(ReplyInterface::TABLE);
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_SMALLINT,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true]
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    100,
                    ['nullable' => false]
                ) 
                ->addColumn(
                    'password',
                    Table::TYPE_TEXT,
                    100,
                    ['nullable' => false]
                );

            $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
