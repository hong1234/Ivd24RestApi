<?php
namespace Ivd24\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Ivd24\Service\Object\ObjectService;

/**
 * Class ObjectController
 * @package Ivd24\Controller
 *
 * @Route(path="api")
 */
class ObjectController //extends AbstractController
{
    private $objectService;
   
    public function __construct(ObjectService $objectService)
    {
        $this->objectService = $objectService;
    }

    /**
     * @Route("/objectdata/{userId}", name="object_get_by_userid", methods={"GET"})
     */
    public function getObjectByUserid($userId)
    { 
        $rs = $this->objectService->getObjectByUserid(trim($userId));
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);  
    }

    /**
     * @Route("/objectdata/{userId}/{objectId}", name="object_get_by_userid_objectid", methods={"GET"})
     */
    public function getObjectByObjectid($userId, $objectId)
    { 
        $rs = $this->objectService->getObjectByObjectid(trim($objectId));
        //var_dump($rs); exit;
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);  
    }

    /**
     * @Route("/storybox", name="object_attachment_insert_video", methods={"POST"})
     */
    public function insertObjectAttachmentVideo(Request $request)
    {
        // <userId>/<objektid>/<art>/<titel>/<format>/link
        // Request Body in json format
        // {   
        //     "objekt_id": 81,         <objektid>
        //     "anhang_titel": "abc",    <titel>
        //     "anhang_pfad": "https://www.linkzumvideo.de" <link>

        //     "anhang_art": "Video",    <art>
        //     "anhang_format": "link",  <format>

        //     "user_id": 345            <userId>  // option (!)
        // }
        
        //     "config_server_id": 3,          ----------
        //     "anhang_bilderordner": "abc001",----------

        $attachment = json_decode($request->getContent(), true); // array()
        $rs = $this->objectService->insertObjectAttachmentVideo($attachment);
        return new Response(json_encode($rs), Response::HTTP_CREATED, ['Content-Type' => 'application/json']);
    }
    
}