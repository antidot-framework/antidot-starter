<?php

declare(strict_types=1);

namespace App\Application\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SomeCommandExample extends Command
{
    protected function configure()
    {
        $this->setName('my:custom:command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
