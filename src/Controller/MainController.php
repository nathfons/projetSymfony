<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $toto = 'Ma variable toto';
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'toto' => $toto,
        ]);
    }

    /**
     * @Route("/test",name="test")
     */
    public function test(){

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'toto' => $toto,
        ]);
    }
}
