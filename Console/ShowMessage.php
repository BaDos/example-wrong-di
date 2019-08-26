<?php

namespace MyVendor\ExampleWrongDi\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\App\ObjectManager;
use MyVendor\ExampleWrongDi\Model\MessageFactory;


class ShowMessage extends Command
{
    private $message;

    public function __construct($name = null)
    {
        $this->message = ObjectManager::getInstance()
            ->get(MessageFactory::class)
            ->create();
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = $this->message->getMessage();
        $output->writeln($message);
        return 1;
    }

    protected function configure()
    {
        $this->setName('example:wrong:di');
        $this->setDescription('Show a message');
    }
}
