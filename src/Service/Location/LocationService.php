<?php
namespace Ivd24\Service\Location;

use Ivd24\Dao\Location\LocationDao;

class LocationService
{
    public $dao;

    function __construct(LocationDao $dao) {
        $this->dao = $dao;  
    }

    function getLocationByName(String $ortName) {

        $locations = $this->dao->getLocationByName([
            $ortName
        ]);
        if(count($locations)==1){
            return $locations[0];
        } else {
            return ["l_id" => "0"];
        }
    }

    // function insertLocation(Location $loc) {
    //     $this->dao->insertLocation([
    //         $loc->name,
    //         $loc->parentid,
    //         $loc->level
    //     ]);
    // }

    function insertLocation(iterable $location) {
        $this->dao->insertLocation($location);
        return 1;
    }
}