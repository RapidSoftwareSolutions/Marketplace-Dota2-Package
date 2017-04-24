<?php
namespace Models;

Class NextPage {
    protected $all_data = [];
    
    public function page($url, $headers='', $query='', $next) {
        
        if($url) {
            $params = explode('?',$url);
            $args = explode('&',$params[1]);
            foreach($args as $item) {
               $item = explode('=', $item);
               $query[$item[0]] = $item[1];
            }
            
            $client = new \GuzzleHttp\Client();

            $resp = $client->get( $params[0], 
                [
                    'headers' => $headers,
                    'query' => $query
                ]);

            $rawBody = json_decode($resp->getBody());
            $this->all_data[] = $rawBody;

            if(!empty($rawBody->$next->next)) {
                $this->page($rawBody->$next->next, $headers, $query, $next);
            }
        }
        return $this->all_data;
    }    
    
}

