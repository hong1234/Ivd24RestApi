<?php
namespace Ivd24\Dao\Object;

use Ivd24\Dao\BaseDao;

class ObjectDao extends BaseDao {

    public function getObjectByUserid(iterable $values) {
        $sql = 'SELECT objekt_id, objekt_id_intern, user_id, objekt_titel, ort FROM objekt_master WHERE user_id = :user_id';
        return $this->doQuery($sql, $values);
    }

    public function getObjectByUseridAndObjectid(iterable $values) {
        $sql = 'SELECT objekt_id, objekt_id_intern, user_id, objekt_titel, ort FROM objekt_master WHERE user_id = :user_id AND objekt_id = :object_id';
        return $this->doQuery($sql, $values);
    }

    public function insertObjectAttachment(iterable $values) {
        $sql = 'INSERT INTO objekt_anhaenge (objekt_id, anhang_titel, anhang_pfad, anhang_art, anhang_format, config_server_id, anhang_bilderordner, reihenfolge) 
                VALUES (:objekt_id, :anhang_titel, :anhang_pfad, :anhang_art, :anhang_format, :config_server_id, :anhang_bilderordner, :reihenfolge)';
        return $this->doSQL($sql, $values); 
    }

    public function getObjectData(iterable $values) {
        $sql = 'SELECT config_server_id, anhang_bilderordner FROM objekt_master WHERE objekt_id = :object_id';
        return $this->doQuery($sql, $values);
    }

    public function updateSequenceOfNonVideoAttachment(iterable $values) {
        $sql = "UPDATE objekt_anhaenge SET reihenfolge = reihenfolge + 1 WHERE objekt_id = :object_id AND anhang_art != 'Video'";
        return $this->doSQL($sql, $values);
    }

}