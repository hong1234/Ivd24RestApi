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
        $sql = 'SELECT makler.anrede, makler.titel, makler.namenstitel, makler.name, makler.vorname, makler.firma, makler.strasse, makler.ort, makler.email, makler.telefon, makler.fax, makler.mobil, makler.homepage
                FROM user_makler as makler LEFT JOIN user_account as user ON user.user_id = makler.user_id AND user.art_id = 2 AND user.recht_id = 3';
        return $this->doQuery($sql, $values);
    }

    public function getMaklerDataByUserid(iterable $values) {
        $sql = 'SELECT makler.anrede, makler.titel, makler.namenstitel, makler.name, makler.vorname, makler.firma, makler.strasse, makler.ort, makler.email, makler.telefon, makler.fax, makler.mobil, makler.homepage
                FROM user_makler as makler LEFT JOIN user_account as user ON user.user_id = makler.user_id WHERE user.art_id = 2 AND user.recht_id = 3 and makler.user_id = :user_id';
        return $this->doQuery($sql, $values);
    }

    public function getMaklerDataByEmail(iterable $values) {
        $sql = 'SELECT makler.anrede, makler.titel, makler.namenstitel, makler.name, makler.vorname, makler.firma, makler.strasse, makler.ort, makler.email, makler.telefon, makler.fax, makler.mobil, makler.homepage
                FROM user_makler as makler LEFT JOIN user_account as user ON user.user_id = makler.user_id WHERE user.art_id = 2 AND user.recht_id = 3 and makler.email LIKE :email';
        return $this->doQuery($sql, $values);
    }
    
}