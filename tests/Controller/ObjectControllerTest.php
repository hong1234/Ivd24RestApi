<?php
namespace Ivd24\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ObjectControllerTest extends WebTestCase
{
    public function testInsertObjectAttachmentVideo()
    {
        $client = static::createClient();

        $object_id = 73197;
        $titel = "abcNew22ABC";
        // add video attachment ------------------------------------
        $video = [
            "objekt_id" => $object_id,  
            "anhang_titel" => $titel,  
            "anhang_pfad" => "https://www.linkzumvideo2.de",
            "anhang_art" => "Video",
            "anhang_format" => "link"
        ];

        // submits a raw JSON string in the request body
        $client->request('POST', '/storybox',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode($video)
        );

        //$this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString(
            'abcNew22ABC',
            $client->getResponse()->getContent()
        );
    }
}