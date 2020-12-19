<?php
namespace Ivd24\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

use Ivd24\Repository\LocationRepository;
use Ivd24\Dao\Location\LocationDao;
//use Ivd24\Entity\Location;

class LocationCommand extends Command
{
    // the name of the command (the part after "bin/console")
    // php bin/console app:search-location Starnberg
    
    protected static $defaultName = 'app:search-location';

    private $locationRepository;
    private $locationDao;

    public function __construct(LocationRepository $locationRepository, LocationDao $locationDao)
    {
        $this->locationRepository = $locationRepository;
        $this->locationDao = $locationDao;

        parent::__construct();
    }

    protected function configure()
    {
        $this
        // configure an argument
        ->addArgument('locationname', InputArgument::REQUIRED, 'The name of the location.')
        //->addArgument('parentid', InputArgument::REQUIRED, 'The id of the parent.')
        //->addArgument('level', InputArgument::REQUIRED, 'The level of the location.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$rs = $this->locationRepository->searchLocation($input->getArgument('locationname'));
        //var_dump($rs);

        $searchkey = $input->getArgument('locationname');
        $locs = $this->locationDao->searchLocationByName([
            'searchkey' => '%'.$searchkey.'%'
        ]);  
        foreach ($locs as $loc) {
            echo "------------\n";
            echo $loc['l_id'] . " | " . $loc['l_name'] . "\n";
        }

        //$output->write('Location '.$input->getArgument('locationname').' created.');
        //$output->writeln('Location '.$input->getArgument('locationname').' created.');
        
        //return 0;
    }
}
