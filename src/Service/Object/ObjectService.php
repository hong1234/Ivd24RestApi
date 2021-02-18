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

        $objekt_id = $attachment['objekt_id'];
        $anhang_pfad = $attachment['anhang_pfad'];
        $rs = $this->dao->getServerIdAndImageDirectory(['object_id' => $objekt_id]);
        $attachment2 = array_merge($attachment, $rs[0], ["reihenfolge" => 1]);

        //var_dump($attachment2);exit;//hong

        if($this->dao->insertObjectAttachment($attachment2)){
            $this->dao->updateObjektMaster(['media_video' => $anhang_pfad, 'object_id' => $objekt_id]);
            // update non-video attachments of object
            $this->dao->updateSequenceOfNonVideoAttachment(['object_id' => $objekt_id]);
            return array_merge($attachment2, ["status" => "ok"]);
        } else {
            return ["status" => "faild"];
        }
    }
}