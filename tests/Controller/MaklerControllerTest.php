<?php
namespace Ivd24\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MaklerControllerTest extends WebTestCase
{
    public function testGetMaklerUser()
    {
        $client = static::createClient();

        $identifier = 11561;

        $response = $client->request('GET', '/getmakleruser?identifier='.$identifier);

        //$this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('J.Gröger', json_decode ($client->getResponse()->getContent())[0]->username);

        // $this->assertStringContainsString(
        //     'info@i-m-living.de',
        //     $client->getResponse()->getContent()
        // );
    }
}