<?php
namespace Code\Request;

use GuzzleHttp\Client;

class TeamsRequest
{
	/**
	 * @var Client
	 */
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function getTeams($groupLetter = null)
	{
		$response = $this->client->request('GET', API_URL . '/teams/');
		$teams    = json_decode($response->getBody());
		if($groupLetter) {
			$filterTeams = array_filter($teams, function($t) use($groupLetter) {
				return $t->group_letter == $groupLetter;
			});

			return $filterTeams;
		}

		return $teams;
	}
}