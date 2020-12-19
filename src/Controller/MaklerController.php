<?php
namespace Ivd24\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Ivd24\Service\Makler\MaklerService;

/**
 * Class MaklerController
 * @package Ivd24\Controller
 *
 * @Route(path="")
 */
class MaklerController //extends AbstractController
{
    /**
     * @Route("/getallmakleruser", name="api_makler_get_all", methods={"GET"})
     */
    public function getAllMaklerUser(MaklerService $maklerService)
    {
        $rs = $maklerService->getAllMaklerUser();
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/getmakleruser", name="api_makler_get_by_useridentifier", methods={"GET"})
     */
    public function getMaklerUser(Request $request, MaklerService $maklerService)
    { 
        //  /getmakleruser?identifier=user_id or email
        $userIdentifier = $request->query->get('identifier');
        $rs = $maklerService->getMaklerUser(trim($userIdentifier));
        //return $this->json($rs);
        return new Response(json_encode($rs), Response::HTTP_OK, ['Content-Type' => 'application/json']);  
    }

}