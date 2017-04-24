       <?php
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
           'getLeagueListing',
        'metadata'
       ];
       foreach ($routes as $file) {
           require __DIR__ . '/../src/routes/' . $file . '.php';
       }

