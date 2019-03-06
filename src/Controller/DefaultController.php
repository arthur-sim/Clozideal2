<?php

namespace App\Controller;
 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TrickRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(TrickRepository $trickRepository): Response
    {
        return $this->render('index.html.twig', ['tricks' => $trickRepository->findAll()]);
    }
    /**
     * @Route("/", name="admin")
     */
    public function admin(){
        return $this->render('index.html.twig', ['tricks' => $trickRepository->findAll()]);
    }
}