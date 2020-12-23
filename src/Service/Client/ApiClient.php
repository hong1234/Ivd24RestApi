<?php
namespace Ivd24\Service\Client;

use Ivd24\Service\Client\BaseClient;

class ApiClient extends BaseClient {

    public function getMaklerUser(iterable $values) {
        $url = 'http://localhost:8000/getmakleruser';
        return $this->doGet($url, $values);
    }

    public function addVideoAttachment(iterable $values) {
        $url = 'http://localhost:8000/storybox';
        return $this->doPost($url, $values);
    }
}