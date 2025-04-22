<?php
namespace Reply\Example\Model\ViewModel;

use Psr\Log\LoggerInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class CustomViewModel implements ArgumentInterface
{
    private $_logger;
    private $productRepository;
    private $product;
 
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        ProductRepositoryInterface $productRepository,
        Product $product
    )
    {        
        $this->_logger = $logger;
        $this->product = $product;
        $this->productRepository = $productRepository;
    }

    public function getTitle()
    {
      return 'Hello World';
    }

}



