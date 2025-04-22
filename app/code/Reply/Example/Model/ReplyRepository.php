<?php

namespace Reply\Example\Model;

use Reply\Example\Api\Data\ReplyRepositoryInterface;
use Reply\Example\Api\Data\ReplyInterface;
use Reply\Example\Model\ResourceModel\Reply as ReplyResource;
use Magento\Framework\Exception\NoSuchEntityException;

class ReplyRepository implements ReplyRepositoryInterface
{
    /**
     * @var ReplyResource
     */
    private $resource;

    /**
     * @var ReplyFactory
     */
    private $factory;

    public function __construct(
        ReplyResource $resource,
        ReplyFactory $factory
    ) {
        $this->resource = $resource;
        $this->factory = $factory;
    }

    /**
     * @param int $id
     * @param null $idFieldName
     * @return ReplyInterface
     * @throws NoSuchEntityException
     */
    public function get($id)
    {
        $entity = $this->factory->create();
        $this->resource->load($entity, $id, $idFieldName);
        if (!$entity->getId()) {
            throw new NoSuchEntityException(__('Requested filter setting doesn\'t exist'));
        }
        return $entity;
    }

    /**
     * @return $this
     */
    public function save(ReplyInterface $reply)
    {
        $this->resource->save($reply);
        return $this;
    }
}
