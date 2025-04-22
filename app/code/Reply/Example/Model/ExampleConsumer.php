<?php
namespace Reply\Example\Model;

class ExampleConsumer
{
    protected $_logger;
 
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        array $data = []
    )
    {        
        $this->_logger = $logger;
    }

    public function process($message)
    {
        // Process the message
        $this->_logger->debug($message); 
        $this->_logger->info($message); 
        $this->_logger->alert($message); 
        $this->_logger->notice($message); 
        $this->_logger->error($message); 
        $this->_logger->critical($message); 
    }

}