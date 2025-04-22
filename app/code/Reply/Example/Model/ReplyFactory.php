<?php

namespace Reply\Example\Model;

use Reply\Example\Api\Data\ReplyInterface;

/**
 * Class ReplyFactory
 * @package Reply\Example\Model
 */
class ReplyFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    /**
     * Provide Reply Istance
     *
     * @param array $arguments
     * @return ReplyInterface
     * @throws \UnexpectedValueException
     */
    public function create(array $arguments = [])
    {
        return $this->_objectManager->create(ReplyInterface::class, $arguments);
    }
}
