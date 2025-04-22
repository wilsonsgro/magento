<?php

namespace Reply\Example\Setup\Operation;

use Reply\Example\Api\Data\ReplyInterface;

class AddImage
{
    /**
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $setup
     * @throws \Zend_Db_Exception
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function execute(\Magento\Framework\Setup\ModuleDataSetupInterface $setup)
    {
        $setup->getConnection()->addColumn(
            $setup->getTable(ReplyInterface::TABLE),
            'small_image',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => '1000',
                'nullable' => false,
                'default' => '',
                'comment' => 'Image'
            ]
        );
    }
}
