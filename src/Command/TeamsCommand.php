<?php
namespace Code\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TeamsCommand extends Command
{
	protected function configure()
	{
		$this->setName('worldcup:teams');
		$this->setDescription('Show the World Cup Teams');
		$this->addArgument('test', null, 'Testing...');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$arg = $input->getArgument('test');
		$output->writeln('Testing..., ' . $arg);
	}
}