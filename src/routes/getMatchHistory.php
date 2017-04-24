<?php
$app->post('/api/Dota2/getMatchHistory', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API

    $query_str = $settings['api_url'] . "/IDOTA2Match_570/GetMatchHistory/v1";
    $body['key'] = $post_data['args']['apiKey'];

    if (isset($post_data['args']['heroId']) && strlen($post_data['args']['heroId']) > 0) {
        $body['hero_Id'] = $post_data['args']['heroId'];
    }
    if (isset($post_data['args']['gameMode']) && strlen($post_data['args']['gameMode']) > 0) {
        $body['game_mode'] = $post_data['args']['gameMode'];
    }
    if (isset($post_data['args']['skill']) && strlen($post_data['args']['skill']) > 0) {
        $body['skill'] = $post_data['args']['skill'];
    }
    if (isset($post_data['args']['minPlayers']) && strlen($post_data['args']['minPlayers']) > 0) {
        $body['min_players'] = $post_data['args']['minPlayers'];
    }
    if (isset($post_data['args']['accountId']) && strlen($post_data['args']['accountId']) > 0) {
        $body['account_id'] = $post_data['args']['accountId'];
    }
    if (isset($post_data['args']['leagueId']) && strlen($post_data['args']['leagueId']) > 0) {
        $body['league_id'] = $post_data['args']['leagueId'];
    }
    if (isset($post_data['args']['startAtMatchId']) && strlen($post_data['args']['startAtMatchId']) > 0) {
        $body['start_at_match_id'] = $post_data['args']['startAtMatchId'];
    }
    if (isset($post_data['args']['matchesRequested']) && strlen($post_data['args']['matchesRequested']) > 0) {
        $body['matches_requested'] = $post_data['args']['matchesRequested'];
    }
    if (isset($post_data['args']['tournamentGamesOnly']) && strlen($post_data['args']['tournamentGamesOnly']) > 0) {
        $body['tournament_games_only'] = $post_data['args']['tournamentGamesOnly'];
    }
    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('GET', $query_str, [
            'query' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        $errorSet = $rawBody->result->error;

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200' && $errorSet == null) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});