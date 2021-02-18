<?php
namespace Ivd24\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Ivd24\Service\Makler\MaklerService;

/**
 * Class MaklerController
 * @package Ivd24\Controller
 *
 * @Route(path="api")
 */
class MaklerController //extends AbstractController
{
    private $maklerService;
   
    public function __construct(MaklerService $maklerService)
    {
        $this->maklerService = $maklerService;
    }

    /**
     * @Route("/getallmakleruser", name="api_makler_get_all", methods={"GET"})
     */
    public function getAllMaklerUser()
    {
        $rs = $this->maklerService->getAllMaklerUser();
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/getmakleruser", name="api_makler_get_by_useridentifier", methods={"GET"})
     */
    public function getMaklerUser(Request $request)
    { 
        //  /getmakleruser?identifier=<user_id> or <email>  //info@strecker-olenyi.de
        $userIdentifier = $request->query->get('identifier');
        $rs = $this->maklerService->getMaklerUser(trim($userIdentifier));
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);  
    }

    /**
     * @Route("/getallmaklerdata", name="api_makler_get_all_data", methods={"GET"})
     */
    public function getAllMaklerData()
    {
        $rs = $this->maklerService->getAllMaklerData();
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/getmaklerdata", name="api_makler_get_data_by_makleridentifier", methods={"GET"})
     */
    public function getMaklerData(Request $request)
    { 
        //  /getmaklerdata?identifier=<user_id> or <email>
        $maklerIdentifier = $request->query->get('identifier');
        $rs = $this->maklerService->getMaklerData(trim($maklerIdentifier));
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);  
    }

}