<?php
namespace Reply\Example\Console\Command;

use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Reply\Example\Model\ExamplePublisher;

class PublishMessageCommand extends Command
{
    protected $publisher;

    public function __construct(ExamplePublisher $publisher)
    {
        $this->publisher = $publisher;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('reply:example:publish')
            ->setDescription('Publish a message to the RabbitMQ queue');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->publisher->publish("wison1234");
        $output->writeln('<info>Message published successfully</info>');
        return Cli::RETURN_SUCCESS;
    }
}