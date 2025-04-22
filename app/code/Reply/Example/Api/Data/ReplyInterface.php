<?php

namespace Reply\Example\Api\Data;

use Magento\Framework\Exception\NoSuchEntityException;

interface ReplyInterface
{

    const ID = 'id';
    const NAME = 'name';
    const PASSWORD = 'password';
    const SMALLIMAGE = 'small_image';

    public function getId();
    public function getName();
    public function getPassword();
    public function getSmallImage();

}
