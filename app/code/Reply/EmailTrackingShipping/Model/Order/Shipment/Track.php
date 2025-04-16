<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace  Reply\EmailTrackingShipping\Model\Order\Shipment;

use Magento\Framework\Api\AttributeValueFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Api\Data\ShipmentTrackInterface;
use Magento\Sales\Model\AbstractModel;
use Magento\Sales\Model\Order\Shipment\Track as ParentTrack;
use Reply\EmailTrackingShipping\Block\Adminhtml\Form\Field\NameCourier;

/**
 * @api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @since 1.0.0
 */
class Track extends ParentTrack
{
    const CONFIG_DATA_NAME_COURIER = "general/custom_name_courier/name_courier";
    const TRIM_NUMBER_BRT = 3 ;
    const CHECK_NUMBER_BRT = "BRT";
    const CHECK_URL_GLS = "GLS";
   
    private $scopeConfig;
    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory
     * @param AttributeValueFactory $customAttributeFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Sales\Api\ShipmentRepositoryInterface $shipmentRepository
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory,
        AttributeValueFactory $customAttributeFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Sales\Api\ShipmentRepositoryInterface $shipmentRepository,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct(
                $context,
                $registry,
                $extensionFactory,
                $customAttributeFactory,
                $storeManager,
                $shipmentRepository,
                $resource ,
                $resourceCollection,
                $data 
        );
       
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Magento\Sales\Model\ResourceModel\Order\Shipment\Track::class);
    }

    public function getUrlTrucking()
    {
        $title = $this->getData(ShipmentTrackInterface::TITLE); 
        $title =  strtolower(trim($title));
        $value  = $this->scopeConfig 
        ->getValue(
            self::CONFIG_DATA_NAME_COURIER,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ); 

        $data = json_decode($value, true);

        foreach ($data as $item) {
            if( strtolower(trim($item[NameCourier::SIGLA])) ==  $title) {
                 $number = $this->getNumberEmail();
                 if( $title == strtolower(trim(self::CHECK_URL_GLS))) {
                    $url = $this->createUrlTrackingGls($number, $item[NameCourier::URL]);
                 } else {
                    $url = $item[NameCourier::URL] . $number ;
                 }
                 return $url;
            }
        }

        return "#";
    }


    private function createUrlTrackingGls($number, $string2) 
    {
        $pieces = explode("numero_spedizione=", $string2);
        $url = $pieces[0] . "numero_spedizione=" . $number . $pieces[1];
        return  $url ;
    }

    private function getNumberEmail()
    {
        $number = $this->getData('track_number');
        $title = $this->getData(ShipmentTrackInterface::TITLE); 
        $title =  strtolower(trim($title));
        if( $title ==  strtolower(trim(self::CHECK_NUMBER_BRT)) ) {
            $value  = $this->scopeConfig 
            ->getValue(
                self::CONFIG_DATA_NAME_COURIER,
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            ); 
    
            if(!empty($value)) {
                $data = json_decode($value, true);
                foreach ($data as $item) {
                    if( strtolower(trim($item[NameCourier::SIGLA])) ==  $title) {
                         $number = substr($number, 0, -3);
                    }
                }
            }
        }
        return  $number;
    }

    /**
     * Returns title
     *
     * @return string
     */
    public function getTitleEmail()
    {
        $title = $this->getData(ShipmentTrackInterface::TITLE); 
        $title = str_replace(":", "", $title);
        $value  = $this->scopeConfig 
        ->getValue(
            self::CONFIG_DATA_NAME_COURIER,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        ); 

        if(!empty($value)) {
           
            $data = json_decode($value, true);
            foreach ($data as $item) {
                if( strtolower(trim($item[NameCourier::SIGLA])) == strtolower(trim($title))) {
                    return   $item[NameCourier::NAME];
                }
            }
        }
       
        return  $title;
    }
}
