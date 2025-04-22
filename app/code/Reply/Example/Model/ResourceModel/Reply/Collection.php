<?php

namespace Reply\Example\Model\ResourceModel\Reply;

/**
 * Reply Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Collection protected constructor
     */
    protected function _construct()
    {
        $this->_init(
            \Reply\Example\Model\Reply::class,
            \Reply\Example\Model\ResourceModel\Reply::class
        );
    }
}
