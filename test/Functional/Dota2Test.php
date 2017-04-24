<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');
class Dota2Test extends BaseTestCase {

    public function testListMetrics() {

        $routes = [
            'getTournamentPrizePool',
            'getRarities',
            'getHeroes',
            'getGameItems',
            'getTournamentPlayerStats',
            'getTeamInfoByTeamID',
            'getScheduledLeagueGames',
            'getMatchHistoryBySequenceNum',
            'getMatchHistory',
            'getMatchDetails',
            'getLiveLeagueGames',
            'getLeagueListing'

        ];

        foreach($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Dota2/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }

}
