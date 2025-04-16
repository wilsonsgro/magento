<?php
namespace Reply\EmailTrackingShipping\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class NameCourier
 */
class NameCourier extends AbstractFieldArray
{
    const SIGLA = "sigla";
    const URL = "url";
    const NAME = "name";
    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn(self::SIGLA, ['label' => __('Sigla'), 'class' => 'required-entry']);
        $this->addColumn(self::NAME,  ['label' => __('Name'), 'class' => 'required-entry']);
        $this->addColumn(self::URL,   ['label' => __('Url Tracking'), 'class' => 'required-entry']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}
