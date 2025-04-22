<?php

namespace Reply\Example\Setup;

use Reply\Example\Setup\Operation\AddImage;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;

/**
 * Class UpgradeData
 * @package Reply\Example\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var AddImage
     */
    private $image;

    /**
     * @var \Magento\Framework\App\State
     */
    private $state;

    public function __construct(
        \Magento\Framework\App\State $state,
        AddImage $image
    ) {
        $this->state = $state;
        $this->image = $image;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface   $context
     * @return void
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $this->state->emulateAreaCode(
            \Magento\Framework\App\Area::AREA_ADMINHTML,
            [$this, 'upgradeData'],
            [$setup, $context]
        );
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgradeData(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->image->execute($setup);
        }
    }
}
