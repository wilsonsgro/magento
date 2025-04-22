<?php

namespace Reply\Example\Api\Data;

use Magento\Framework\Exception\NoSuchEntityException;

interface ReplyRepositoryInterface
{
    const TABLE = 'reply';
    public function get($id);
    public function save(ReplyInterface $reply);

}
