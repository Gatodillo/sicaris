<?php

namespace Saba\FarmaciaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SabaFarmaciaBundle:Default:index.html.twig', array('name' => $name));
    }
}
