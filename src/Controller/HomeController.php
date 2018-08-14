<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index(Request $request)
    {
        return $this->render('home/index.html.twig', [
            'request' => $request,
        ]);
    }
    /**
     * @Route("/", name="root")
     */
    public function root()
    {
        return $this->redirect("/home");
    }
}
