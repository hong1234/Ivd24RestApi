<?php
namespace Ivd24\Dao\Object;

use Ivd24\Dao\BaseDao;

class ObjectDao extends BaseDao {

    public function getObjectByUserid(iterable $values) {
        $sql = 'SELECT *, AsText(geo_point) AS geo_point, AsText(geo_point_blurred) AS geo_point_blurred, AsText(ahu_geo_point) AS ahu_geo_point FROM objekt_master WHERE user_id = :user_id';
        return $this->doQuery($sql, $values);
    }

    public function getObjectByObjectid(iterable $values) {
        $sql = 'SELECT *, AsText(geo_point) AS geo_point, AsText(geo_point_blurred) AS geo_point_blurred, AsText(ahu_geo_point) AS ahu_geo_point FROM objekt_master WHERE objekt_id = :object_id';
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

    public function updateObjektMaster(iterable $values) {
        $sql = "UPDATE objekt_master SET media_video = :media_video WHERE objekt_id = :object_id";
        return $this->doSQL($sql, $values);
    }

    public function updateSequenceOfNonVideoAttachment(iterable $values) {
        $sql = "UPDATE objekt_anhaenge SET reihenfolge = reihenfolge + 1 WHERE objekt_id = :object_id AND anhang_art != 'Video'";
        return $this->doSQL($sql, $values);
    }

    public function getObjectAttachments(iterable $values) {
        //$sql = 'SELECT objekt_id, config_server_id, anhang_bilderordner, objekt_anhang_id, anhang_titel, anhang_pfad, reihenfolge FROM objekt_anhaenge WHERE objekt_id = :object_id ORDER BY objekt_anhang_id DESC';
        $sql = 'SELECT objekt_id, objekt_anhang_id, anhang_titel, anhang_pfad, reihenfolge FROM objekt_anhaenge WHERE objekt_id = :object_id ORDER BY objekt_anhang_id DESC';
        return $this->doQuery($sql, $values);
    }

}