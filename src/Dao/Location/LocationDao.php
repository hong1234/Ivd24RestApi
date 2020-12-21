<?php
namespace Ivd24\Dao\Location;

use Ivd24\Dao\BaseDao;

class LocationDao extends BaseDao {

    public function getLocationByName(iterable $values) {
        $sql = 'SELECT id AS l_id FROM location WHERE name = :name';
        return $this->doQuery($sql, $values);
    }

    public function insertLocation(iterable $values) {
        $sql = 'INSERT INTO location (name, parentid, level) VALUES (:name, :parentid, :level)';
        return $this->doSQL($sql, $values);
    }

    public function searchLocationByName(iterable $values) {
        $sql= 'SELECT id AS l_id, name AS l_name FROM location WHERE name LIKE :searchkey';
        return $this->doQuery($sql, $values);         
    }

}