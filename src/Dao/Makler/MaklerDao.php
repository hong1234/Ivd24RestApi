<?php
namespace Ivd24\Dao\Makler;

use Ivd24\Dao\BaseDao;

class MaklerDao extends BaseDao {

    public function getAllMaklerUser(iterable $values) {
        $sql = 'SELECT user_id, username, email, gesperrt, loeschung, authentifiziert, registrierungsdatum, lastlogin FROM user_account WHERE art_id = 2 and recht_id = 3';
        return $this->doQuery($sql, $values);
    }

    public function getMaklerUserByUserid(iterable $values) {
        $sql = 'SELECT user_id, username, email, gesperrt, loeschung, authentifiziert, registrierungsdatum, lastlogin FROM user_account WHERE art_id = 2 and recht_id = 3 and user_id = :user_id';
        return $this->doQuery($sql, $values);
    }

    public function getMaklerUserByEmail(iterable $values) {
        $sql = 'SELECT user_id, username, email, gesperrt, loeschung, authentifiziert, registrierungsdatum, lastlogin FROM user_account WHERE art_id = 2 and recht_id = 3 and email LIKE :email';
        return $this->doQuery($sql, $values);
    }
    
}