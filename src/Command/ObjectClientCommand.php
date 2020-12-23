<?php
namespace Ivd24\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

//use Ivd24\Service\Client\BaseClient;
use Ivd24\Service\Client\ApiClient;
use Ivd24\Dao\Object\ObjectDao;

class ObjectClientCommand extends Command
{
    // php bin/console app:object-client
    protected static $defaultName = 'app:object-client';

    private $objectDao;
    //private $baseClient;
    private $apiClient;

    public function __construct(ObjectDao $objectDao, ApiClient $apiClient)//BaseClient $baseClient)
    {
        $this->objectDao = $objectDao;
        //$this->baseClient = $baseClient;
        $this->apiClient = $apiClient;
        parent::__construct();
    }

    protected function configure()
    {
        //$this
        // configure an argument
        //->addArgument('locationname', InputArgument::REQUIRED, 'The name of the location.')
        //;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$client = new \GuzzleHttp\Client();
        
        // get service --------------------------------------------
        //$email = 'info@i-m-living.de';
        //$identifier = $email;
        //$userId = 11561;
        //$identifier = $userId;
        //$response = $client->get('http://localhost:8000/getmakleruser?identifier='.$identifier);
        //var_dump(json_decode ($response->getBody())[0]->username);

        //$response = $this->baseClient->doGet('http://localhost:8000/getmakleruser',['identifier' => 'info@i-m-living.de']);
        //$response = $this->baseClient->doGet('http://localhost:8000/getmakleruser',['identifier' => 11561]);
        $response = $this->apiClient->getMaklerUser(['identifier' => 11561]);
        //var_dump($response[0]->username);
        echo $response[0]->username . "\n";
        


        $object_id = 73197; 
        //$object_id = 184102781;

        // add video attachment ------------------------------------
        $video = [
            "objekt_id" => $object_id,  
            "anhang_titel" => "abcNew18",  
            "anhang_pfad" => "https://www.linkzumvideo2.de",
            "anhang_art" => "Video",
            "anhang_format" => "link"
        ];

        // $response = $client->post('http://localhost:8000/storybox', [
        //     'headers' => ['Content-Type' => 'application/json'],
        //     'body' => json_encode($video)
        // ]);

        // echo $response->getStatusCode() . "\n";

        //$response = $this->apiClient->addVideoAttachment($video);
        //echo $response . "\n";

        // display attachments of object ----------------------------
        
        $rs = $this->objectDao->getObjectAttachments(['object_id' => $object_id]);
        foreach ($rs as $at) {
            echo $at['objekt_anhang_id'] . ' | ' . $at['reihenfolge'] . ' | ' . $at['anhang_titel'] . "\n";
        }

    }

}