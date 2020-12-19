<?php
namespace Ivd24\Service\Location;

use Ivd24\Dao\Location\LocationDao;

class SearchService
{
    public $dao;
    
    function __construct(LocationDao $dao) {
        $this->dao = $dao;  
    }

    function searchLocationByName(String $searchkey) {
        return $this->dao->searchLocationByName([
            'searchkey' => '%'.$searchkey.'%'
        ]);
    }
}