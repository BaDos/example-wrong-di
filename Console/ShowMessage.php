<?php
/**
 * @license MIT, see LICENSE.txt
 */
namespace BaDos\ExampleWrongDi\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\App\ObjectManager;
use BaDos\ExampleWrongDi\Model\Message;
use BaDos\ExampleWrongDi\Model\MessageFactory;

/**
 * Command to show message
 */
class ShowMessage extends Command
{
    /**
     * @var Message
     */
    private $message;

    /**
     * @param $name
     */
    public function __construct($name = null)
    {
        $this->message = ObjectManager::getInstance()
            ->get(MessageFactory::class)
            ->create();
        parent::__construct($name);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $message = $this->message->getMessage();
        $output->writeln($message);
        return 0;
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('example:wrong:di');
        $this->setDescription('Show a message');
    }
}
