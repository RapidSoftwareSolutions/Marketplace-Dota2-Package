[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Dota2/functions?utm_source=RapidAPIGitHub_Dota2Functions&utm_medium=button&utm_content=RapidAPI_GitHub)

# SteamWeb Package
SteamWeb
* Domain: [Steam Web API](http://steampowered.com)
* Credentials: apiKey

## How to get credentials: 
0. Go to [Steam Website](http://steampowered.com)
1. Register or log in
2. Go to [Dev page](http://steamcommunity.com/dev/registerkey) to get your apiKey

## Dota2.getLeagueListing
Information about DotaTV-supported leagues.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| apiKey from Steam
| language| String     | The ISO639-1 language code for the language all tokenized strings should be returned in. Not all strings have been translated to every language. If a language does not have a string, the English string will be returned instead. If this parameter is omitted the string token will be returned for the strings.

## Dota2.getLiveLeagueGames
A list of in-progress league matches, as well as details of that match as it unfolds.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| apiKey from Steam

## Dota2.getMatchDetails
Information about a particular match.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| apiKey from Steam
| matchId| Number     | Id of the match

## Dota2.getMatchHistory
A list of matches, filterable by various parameters.

| Field              | Type       | Description
|--------------------|------------|----------
| apiKey             | credentials| apiKey from Steam
| heroId             | Number     | A list of hero IDs can be found via the GetHeroes method.
| gameMode           | Number     | 0 - None 1 - All Pick 2 - Captain's Mode 3 - Random Draft 4 - Single Draft 5 - All Random  6 - Intro  7 - Diretide 8 - Reverse Captain's Mode 9 - The Greeviling 10 - Tutorial 11 - Mid Only 12 - Least Played 13 - New Player Pool 14 - Compendium Matchmaking 16 - Captain's Draft
| skill              | Number     | Skill bracket for the matches (Ignored if an account ID is specified). 0 - Any 1 - Normal 2 - High 3 - Very High
| minPlayers         | Number     | Minimum amount of players in a match for the match to be returned.
| accountId          | Number     | 32-bit account ID.
| leagueId           | String     | Only return matches from this league. A list of league IDs can be found via the GetLeagueListing method.
| startAtMatchId     | Number     | Start searching for matches equal to or older than this match ID.
| matchesRequested   | Number     | Amount of matches to include in results (default: 25).
| tournamentGamesOnly| String     | Whether to limit results to tournament matches. (0 = false, 1 = true)

## Dota2.getMatchHistoryBySequenceNum
A list of matches ordered by their sequence num.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| apiKey from Steam
| startAtMatchSeqNum| Number     | The match sequence number to start returning results from.
| matchesRequested  | Number     | Amount of matches to include in results (default: 25).

## Dota2.getScheduledLeagueGames
A list of scheduled league games coming up.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| apiKey from Steam
| dateMin| Number     | Unix timestamp
| dateMax| Number     | Unix timestamp

## Dota2.getTeamInfoByTeamID
A list of all the teams set up in-game.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| apiKey from Steam
| startAtTeamId | Number     | The team id to start returning results from.
| teamsRequested| Number     | The amount of teams to return.

## Dota2.getTournamentPlayerStats
Stats about a particular player within a tournament.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| apiKey from Steam
| accountId| Number     | Id of the account
| heroId   | Number     | A list of hero IDs can be found via the GetHeroes method.

## Dota2.getGameItems
Dota 2 In-game items

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| apiKey from Steam
| language| String     | The language code to provide item names in.

## Dota2.getHeroes
A list of heroes within Dota 2.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| apiKey from Steam
| language| String     | The language code to provide item names in.

## Dota2.getRarities
Dota 2 item rarity list.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| apiKey from Steam
| language| String     | The language code to provide item names in.

## Dota2.getTournamentPrizePool
The current prizepool for specific tournaments.

| Field   | Type       | Description
|---------|------------|----------
| apiKey  | credentials| apiKey from Steam
| leagueId| Number     | The ID of the league to get the prize pool of.

