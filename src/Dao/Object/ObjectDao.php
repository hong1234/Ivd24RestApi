<?php
namespace Ivd24\Dao\Object;

use Ivd24\Dao\BaseDao;

class ObjectDao extends BaseDao {

    public function getObjectByUserid(iterable $values) {
        $sql = 'SELECT * FROM objekt_master WHERE user_id = :user_id';
        return $this->doQuery($sql, $values);
    }

    public function getObjectByObjectid(iterable $values) {
        //$sql = 'SELECT objekt_id, objekt_id_intern, user_id, objekt_titel, ort FROM objekt_master WHERE objekt_id = :object_id';
        //$sql = 'SELECT objekt_id_intern, user_id, objekt_titel, geo_point, geo_point_blurred, ahu_geo_point FROM objekt_master WHERE objekt_id = :object_id';
        $sql = 'SELECT * FROM objekt_master WHERE objekt_id = :object_id';
        return $this->doQuery($sql, $values);
    }

    public function getServerIdAndImageDirectory(iterable $values) {
        $sql = 'SELECT config_server_id, anhang_bilderordner FROM objekt_master WHERE objekt_id = :object_id';
        return $this->doQuery($sql, $values);
    }

    //public function getServerIdAndImageDirectory2(iterable $values) {
    //    $sql = 'SELECT bilderserver_id as config_server_id, bilderordner as anhang_bilderordner FROM user_makler_config WHERE user_id = :user_id';
    //    return $this->doQuery($sql, $values);
    //}

    public function insertObjectAttachment(iterable $values) {
        $sql = 'INSERT INTO objekt_anhaenge (objekt_id, anhang_titel, anhang_pfad, anhang_art, anhang_format, config_server_id, anhang_bilderordner, reihenfolge) 
                VALUES (:objekt_id, :anhang_titel, :anhang_pfad, :anhang_art, :anhang_format, :config_server_id, :anhang_bilderordner, :reihenfolge)';
        return $this->doSQL($sql, $values); 
    }

    public function updateSequenceOfNonVideoAttachment(iterable $values) {
        $sql = "UPDATE objekt_anhaenge SET reihenfolge = reihenfolge + 1 WHERE objekt_id = :object_id AND anhang_art != 'Video'";
        return $this->doSQL($sql, $values);
    }

}