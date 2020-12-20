<?php
namespace Ivd24\Service\Object;

use Ivd24\Dao\Object\ObjectDao;

class ObjectService
{
    public $dao;

    function __construct(ObjectDao $dao) {
        $this->dao = $dao;  
    }

    function getObjectByUserid($userId) {
        return $this->dao->getObjectByUserid([
            'user_id' => $userId
        ]);
    }

    function getObjectByUseridAndObjectid($userId, $objectId) {
        return $this->dao->getObjectByUseridAndObjectid([
            'user_id' => $userId,
            'object_id' => $objectId
        ]);
    }

    function insertObjectAttachment(iterable $attachment) {
        
        $objekt_id = $attachment['objekt_id'];
        $rs = $this->dao->getObjectData(['object_id' => $objekt_id]);
        $attachment2 = array_merge($attachment, $rs[0], ["reihenfolge" => 1]);
        $this->dao->insertObjectAttachment($attachment2);

        //$objekt_id = 73197;
        $rs = $this->dao->getObjectAttachmentNotVideo(['object_id' => $objekt_id]);
        foreach ($rs as $at) {
            //echo $at['objekt_anhang_id'] . ' | ' . $at['reihenfolge'] . "\n";
            if($at['reihenfolge'] < 2){
                $this->dao->updateAttachment([
                    'objekt_anhang_id' => $at['objekt_anhang_id'],
                    'reihenfolge' => $at['reihenfolge'] + 1    
                ]);
            }
        }

        return 1;
    }
}