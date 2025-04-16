<?php

namespace Reply\EmailTrackingShipping\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $_searchCriteriaBuilder;
        
    protected $_shipmentRepositoryInterface;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Sales\Api\ShipmentRepositoryInterface $shipmentRepositoryInterface
    ) {
        parent::__construct($context);
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_shipmentRepositoryInterface = $shipmentRepositoryInterface;
    }

    private function getShippingFromOrder($order)
    {
        $orderId = $order->getId();
        if($orderId) {
            $searchCriteria = $this->_searchCriteriaBuilder->addFilter('order_id', $orderId)->create();
            try {
                $shipments = $this->_shipmentRepositoryInterface->getList($searchCriteria);
                $shipmentData = $shipments->getItems();
                
            } catch (Exception $exception)  {
               
            }
        }
    
        return $shipmentData;
    }

    public function getTrackingPopupUrlBySalesModel($order)
    {
        $shipmentData = $this->getShippingFromOrder($order);
        if(!empty($shipmentData)) {
            foreach( $shipmentData as $shipment) {
                $track = $shipment->getTrack();
                $tracksCollection = $shipment->getTracksCollection();
                foreach( $tracksCollection as $track) {
                    return $track->getUrlTrucking();
                }
            }
        }
        return '#';
    }

    public function getTrackingPopupUrlByShipment($shipment)
    {
        $track = $shipment->getTrack();
        $tracksCollection = $shipment->getTracksCollection();
        foreach( $tracksCollection as $track) {
            return $track->getUrlTrucking();
        }
        return '#';
    }
}
