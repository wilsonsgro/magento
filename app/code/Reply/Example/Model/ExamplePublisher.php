<?php
namespace Reply\Example\Model;

use Magento\Framework\MessageQueue\PublisherInterface;

class ExamplePublisher
{
    protected $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function publish($message)
    {
        $this->publisher->publish('reply.example', $message);
    }
}
