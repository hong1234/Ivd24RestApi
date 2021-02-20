<?php
namespace Ivd24\Dao;

use Doctrine\ORM\EntityManagerInterface;
//use App\Location\Entity\Result;

class BaseDao {
    
    public $db;// Doctrine\DBAL\Connection

    public function __construct(EntityManagerInterface $em) {
        $this->db = $em->getConnection();
        //var_dump($this->db);die;
    }

    public function doQuery($sql, $values){
        $stmt = $this->db->prepare($sql);  // Doctrine\DBAL\Statement
        // var_dump($stmt);die;
        if(!$stmt->execute($values)) {
            throw new \Exception("DoQuery faild!"); 
        }  
        
        return $stmt->fetchAllAssociative();
    }

    public function doSQL($sql, $values){
        $stmt = $this->db->prepare($sql);
        //echo $this->db->lastInsertId(). "\n";
        if(!$stmt->execute($values)){
            throw new \Exception("DoSQL faild!");
        } 
        
        return true;
    }

    public function showResult($objects){
        foreach ($objects as $object) {
            echo $object;
        }
    }

}