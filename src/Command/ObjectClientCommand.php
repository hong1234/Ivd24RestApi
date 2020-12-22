<?php
namespace Ivd24\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

//use App\Importe\Service\LocationClient;

use Ivd24\Dao\Object\ObjectDao;

class ObjectClientCommand extends Command
{
    // php bin/console app:object-client
    protected static $defaultName = 'app:object-client';

    private $objectDao;

    public function __construct(ObjectDao $objectDao)
    {
        $this->objectDao = $objectDao;
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
        $client = new \GuzzleHttp\Client();
        
        // get service --------------------------------------------
        $email = 'info@i-m-living.de';
        $identifier = $email;
        //$userId = 11561;
        //$identifier = $userId;
        $response = $client->get('http://localhost:8000/getmakleruser?identifier='.$identifier);
        var_dump(json_decode ($response->getBody())[0]->username);


        $object_id = 73197; //$objekt_id = 73197;//184102781;

        // add video attachment ------------------------------------
        // $video = [
        //     "objekt_id" => $object_id,  
        //     "anhang_titel" => "abcNew15",  
        //     "anhang_pfad" => "https://www.linkzumvideo2.de",
        //     "anhang_art" => "Video",
        //     "anhang_format" => "link"
        // ];

        // $response = $client->post('http://localhost:8000/storybox', [
        //     'headers' => ['Content-Type' => 'application/json'],
        //     'body' => json_encode($video)
        // ]);

        // echo $response->getStatusCode() . "\n";

        // display attachments of object ----------------------------
        
        $rs = $this->objectDao->getObjectAttachments(['object_id' => $object_id]);
        //print_r($rs);
        foreach ($rs as $at) {
            echo $at['objekt_anhang_id'] . ' | ' . $at['reihenfolge'] . ' | ' . $at['anhang_titel'] . "\n";
        }

    }

}