<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ContactUsController extends Controller
{
  /**
   * Generic page request handler
   */
  public function showAction(Request $request, $slug = 'index')
  {
    return $this->render("contactUs/$slug.html.twig", [
      'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
      'page' => $slug
    ]);
  }

}
