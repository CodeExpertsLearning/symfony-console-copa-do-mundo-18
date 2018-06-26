<?php
namespace Code\Command;

use Code\Request\TeamsRequest;
use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TeamsCommand extends Command
{
	protected function configure()
	{
		$this->setName('worldcup:teams');
		$this->setDescription('Show the World Cup Teams');
		$this->addArgument('group_letter', null, 'Testing...');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$teamsRequest = new TeamsRequest(new Client());
		foreach($teamsRequest->getTeams($input->getArgument('group_letter')) as $team) {
			$output->writeln($team->country . ' - Grupo: ' . $team->group_letter);
		}
	}
}