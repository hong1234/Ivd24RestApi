<?php
namespace Ivd24\Service\Makler;

use Ivd24\Dao\Makler\MaklerDao;

class MaklerService
{
    public $dao;

    function __construct(MaklerDao $dao) {
        $this->dao = $dao;  
    }

    function getAllMaklerUser() {
        return $this->dao->getAllMaklerUser([]);
    }

    function getMaklerUser($identifier) {
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            return $this->dao->getMaklerUserByEmail(['email' => $identifier]);
        } else {
            return $this->dao->getMaklerUserByUserid(['user_id' => (int)$identifier]);
        }
    }

    function getAllMaklerData() {
        return $this->dao->getAllMaklerData([]);
    }

    function getMaklerData($identifier) {
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            return $this->dao->getMaklerDataByEmail(['email' => $identifier]);
        } else {
            return $this->dao->getMaklerDataByUserid(['user_id' => (int)$identifier]);
        }
    }
}