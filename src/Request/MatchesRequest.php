<?php
namespace Code\Request;

use GuzzleHttp\Client;

class MatchesRequest
{
	/**
	 * @var Client
	 */
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function getMatches($team = null)
	{
		$response = $this->client->request('GET', API_URL . '/matches/');
		$matches    = json_decode($response->getBody());

		if($team) {
			$filterMatches = array_filter($matches, function($t) use($team) {
				return $t->home_team->country == $team || $t->away_team->country == $team;
			});

			return $filterMatches;
		}

		return $matches;
	}
}