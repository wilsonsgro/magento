<?php
namespace Reply\Example\Controller\Debug;

class Index extends \Magento\Framework\App\Action\Action
{ 
   protected $_pageFactory;
   
   public function __construct(
    \Magento\Framework\App\Action\Context $context
   ){
        parent::__construct($context);
 }
 
   public function execute()
   {
   
    try {
        die('Test Debug');
    } catch (\Exception $exception) {
        $message = $exception->getMessage();
       
    }
   }
}