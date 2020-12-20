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

    function insertObjectAttachmentVideo(iterable $attachment) {
        $objekt_id = $attachment['objekt_id']; //$objekt_id = 73197;
        $rs = $this->dao->getObjectData(['object_id' => $objekt_id]);
        $attachment2 = array_merge($attachment, $rs[0], ["reihenfolge" => 1]);
        $this->dao->insertObjectAttachment($attachment2);
        // update non-video attachments of object
        $this->dao->updateSequenceOfNonVideoAttachment(['object_id' => $objekt_id]);
        return 1;
    }
}