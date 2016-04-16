<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function homeAction(Request $request)
    {
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'page' => 'homepage'
        ]);
    }

    /**
    * Generic page request handler
    */
    public function pageAction(Request $request, $slug)
    {
        return $this->render('default/' . $slug . '.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'page' => 'homepage'
        ]);
    }

}
