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

    function getObjectByObjectid($objectId) {
        return $this->dao->getObjectByObjectid(['object_id' => $objectId]);
    }

    function insertObjectAttachmentVideo(iterable $attachment) {
        //var_dump($attachment);exit;//hong
        // objekt_id=81
        $rs = $this->dao->getServerIdAndImageDirectory(['object_id' => $attachment['objekt_id']]);
        $attachment = array_merge($attachment, $rs[0], ["reihenfolge" => 1]);

        return $this->dao->insertAttachment($attachment);
    }
}