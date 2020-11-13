<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class IndexController
 * @package App\Controller
 *
 * @Route("/")
 */
class IndexController extends AbstractController
{
    // /**
    //  * @Route("/index", name="index")
    //  * 
    //  *  @return \Symfony\Component\HttpFoundation\Response
    //  */
    // public function index(): Response
    // {
    //     return $this->render('index.html.twig', [
    //         'controller_name' => 'IndexController',
    //     ]);
    //         // return $this->render('index.html.twig')
    // }
    /**
     * @Route("/",  name="index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }
}
