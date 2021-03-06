<?php
namespace Ivd24\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

//use App\Importe\Service\LocationClient;

use Ivd24\Dao\Object\ObjectDao;

class TestCommand extends Command
{
    // php bin/console app:test-test
    protected static $defaultName = 'app:test-test';

    // private $locationClient;

    // public function __construct(LocationClient $locationClient)
    // {
    //     $this->locationClient = $locationClient;
    //     parent::__construct();
    // }

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
        //$output->writeln('Location '.$input->getArgument('locationname').' created.');
        //return 0;
        //$client = new \GuzzleHttp\Client();
        //$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        
        //echo $response->getStatusCode() . "\n"; // 200
        //echo $response->getHeaderLine('content-type') . "\n"; // 'application/json; charset=utf8'
        //echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        //var_dump(json_decode ($response->getBody()));


        //$client = new \GuzzleHttp\Client();
        //$response = $client->request('GET', 'http://localhost:8000/api/location?lname=München');
        //echo (int)json_decode ($response->getBody())->l_id;

        //$ortName = 'München';
        //echo $this->locationClient->getLocationByName($ortName);


        //$response = $client->request('GET', 'http://localhost:8000/api/location/search?lname=berg');
        //var_dump(json_decode ($response->getBody()));
        // foreach (json_decode ($response->getBody()) as $obj) {
        //     echo "------------\n";
        //     echo $obj->l_id . " | " . $obj->l_name . "\n";
        // }

        // $searchkey = 'test';
        // $objs = $this->locationClient->searchLocationByName($searchkey);
        // foreach ($objs as $obj) {
        //     echo "------------\n";
        //     echo $obj->l_id . " | " . $obj->l_name . "\n";
        // }


        // $response = $client->post('http://localhost:8000/api/location', [
        //     'headers' => ['Content-Type' => 'application/json'],
        //     'body' => json_encode([
        //         "name" => "Hanoi", 
        //         "parentid" => 2,
        //         "level" => 2
        //     ])
        // ]);

        // echo $response->getStatusCode() . "\n";

        // $location = [
        //    "name" => "TestYYY", 
        //    "parentid" => 2,
        //    "level" => 2
        // ];

        // echo $this->locationClient->insertLocation($location);
        /////////

        // $searchkey = 'test';
        // $objs = $this->locationClient->searchLocationByName($searchkey);
        // foreach ($objs as $obj) {
        //     echo "------------\n";
        //     echo $obj->l_id . " | " . $obj->l_name . "\n";
        // }


        // $client = new Client();
        // $res = $client->request('GET', 'https://api.github.com/user', [
        //     'auth' => ['user', 'pass']
        // ]);
        // echo $res->getStatusCode();
        // // "200"
        // echo $res->getHeader('content-type')[0];
        // // 'application/json; charset=utf8'
        // echo $res->getBody();
        // // {"type":"User"...'
        //    echo "Hello test \n";

        //$objekt_id = 192844;
        //$objekt_id = 184102781;
        $objekt_id = 60790; //73197;
        $rs = $this->objectDao->getObjectByObjectid(['object_id' => $objekt_id]);
        var_dump($rs);
        //var_dump($rs[0]['geo_point']);
        //var_dump($rs[0]['anhang_bilderordner']);

        //$coordinates = unpack('x/x/x/x/corder/Ltype/dlat/dlon', $rs[0]['geo_point']);
        //$coordinates = unpack('x4/corder/Ltype/dlat/dlon', $rs[0]['geo_point']); 
        //$coordinates = unpack('x9/clat/Llat/dlat/dlon', $rs[0]['geo_point']);
        //echo $coordinates['lat'] . "\n";
        //echo $coordinates['lon'] . "\n";

        // $array1 = array("color" => "red");
        // $array2 = array("color2" => "green", "shape" => "trapezoid");
        // $result = array_merge($array1, $array2);
        //print_r($rs[0]['reihenfolge']);

        //foreach ($rs as $at) {
        //    echo $at['objekt_anhang_id'] . ' | ' . $at['reihenfolge'] . "\n";
        //}

        //var_dump($rs[0]);

        // $rs = $this->objectDao->getObjectByUserid([
        //     'user_id' => 14197
        // ]);
        // var_dump($rs);

    }

}