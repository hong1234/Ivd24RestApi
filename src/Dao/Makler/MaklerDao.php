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

    public function getAllMaklerData(iterable $values) {
        $sql = 'SELECT user_makler.anrede, user_makler.titel,user_makler.namenstitel,user_makler.name,user_makler.vorname,user_makler.firma,user_makler.strasse, user_makler.ort, user_makler.email, user_makler.telefon, user_makler.fax,user_makler.mobil,user_makler.homepage
                FROM user_makler LEFT JOIN user_account ON user_account.user_id = user_makler.user_id AND user_account.art_id = 2 AND user_account.recht_id = 3';
        return $this->doQuery($sql, $values);
    }

    public function getMaklerDataByUserid(iterable $values) {
        $sql = 'SELECT user_makler.anrede, user_makler.titel,user_makler.namenstitel,user_makler.name,user_makler.vorname,user_makler.firma,user_makler.strasse, user_makler.ort, user_makler.email, user_makler.telefon, user_makler.fax,user_makler.mobil,user_makler.homepage
                FROM user_makler LEFT JOIN user_account ON user_account.user_id = user_makler.user_id WHERE user_account.art_id = 2 AND user_account.recht_id = 3 and user_makler.user_id = :user_id';
        return $this->doQuery($sql, $values);
    }

    public function getMaklerDataByEmail(iterable $values) {
        $sql = 'SELECT user_makler.anrede, user_makler.titel,user_makler.namenstitel,user_makler.name,user_makler.vorname,user_makler.firma,user_makler.strasse, user_makler.ort, user_makler.email, user_makler.telefon, user_makler.fax,user_makler.mobil,user_makler.homepage
                FROM user_makler LEFT JOIN user_account ON user_account.user_id = user_makler.user_id WHERE user_account.art_id = 2 AND user_account.recht_id = 3 and user_makler.email LIKE :email';
        return $this->doQuery($sql, $values);
    }
    
}