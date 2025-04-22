<?php

namespace Reply\Example\Model\ResourceModel;

use  Reply\Example\Api\Data\ReplyInterface;
use  Reply\Example\Api\Data\ReplyRepositoryInterface;
use Magento\Framework\Model\AbstractModel;

class Reply extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Reply protected constructor
     */
    protected function _construct()
    {
        $this->_init(ReplyRepositoryInterface::TABLE, ReplyInterface::ID);
    }

}
