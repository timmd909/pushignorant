<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StandingsController extends Controller
{
    public function showAction(Request $request, $slug)
    {
        return $this->render('standings/' . $slug . '.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'page' => 'standings'
        ]);
    }

}
