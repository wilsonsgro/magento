<?php

declare(strict_types=1);

namespace Reply\Example\Model;

use Reply\Example\Api\Data\ReplyInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Store\Model\ScopeInterface;


class Reply extends \Magento\Framework\Model\AbstractModel implements ReplyInterface, IdentityInterface
{
    const CACHE_TAG = 'reply_filter_setting';

    protected $_eventPrefix = 'reply_filter_setting';

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {

        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }

    /**
     * Protected Reply constructor
     */
    protected function _construct()
    {
        $this->_init(\Reply\Example\Model\ResourceModel\Reply::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getData(self::PASSWORD);
    }


    public function getSmallImage() 
    {
        return $this->getData(self::SAMLLIMAGE);
    }

    /**
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

}
