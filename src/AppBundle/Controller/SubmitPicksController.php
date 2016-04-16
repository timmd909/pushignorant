<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SubmitPicksController extends Controller
{
    public function showAction(Request $request, $slug)
    {
        return $this->render('submit-picks/' . $slug . '.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'page' => 'submit-picks'
        ]);
    }

}
