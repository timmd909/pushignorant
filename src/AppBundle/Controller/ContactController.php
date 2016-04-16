<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
    * All Contact Page related stuff
    */
    public function showAction(Request $request, $slug = 'index')
    {
        return $this->render("contact/$slug.html.twig", [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            'page' => 'contact'
        ]);
    }

}
