<?php
namespace Code\Command;

use Code\Request\MatchesRequest;
use Code\Request\TeamsRequest;
use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MatchesCommand extends Command
{
	protected function configure()
	{
		$this->setName('worldcup:matches');
		$this->setDescription('Show the World Cup Matches');
		$this->addArgument('team', null, 'Team Matches');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$matchesRequest = new MatchesRequest(new Client());

		foreach($matchesRequest->getMatches($input->getArgument('team')) as $match) {
			$output->writeln($match->home_team->country . ' '. $match->home_team->goals .' x '
			                 . $match->away_team->country . ' '. $match->away_team->goals);
		}
	}
}