<?php
namespace Ivd24\Service\Client;

class BaseClient {
    
    public $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    function doGet(String $get_url, iterable $params) {
        $queryString = '';
        $i = 0;
        foreach ($params as $k => $v) {
            $i++;
            if($i==1){
                $queryString = $queryString . '?' . $k . '=' . $v;
            } else {
                $queryString = $queryString . '&' . $k . '=' . $v;
            }
        }
        $response = $this->client->get($get_url.$queryString);
        return json_decode ($response->getBody());
    }

    function doPost(String $post_url, iterable $params) {
        $response = $this->client->post($post_url, [
             'headers' => ['Content-Type' => 'application/json'],
             'body' => json_encode($params)
        ]);
        return $response->getStatusCode();
    }

}