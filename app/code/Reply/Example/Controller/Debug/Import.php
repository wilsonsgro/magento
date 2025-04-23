<?php

namespace Reply\Example\Controller\Debug;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Import extends Action
{

    public function __construct(
        Context $context
        )
    {
        parent::__construct($context);
    }

    public function execute()
    {
        die('uncomment this line to use xdebug wilson');
    }
}
