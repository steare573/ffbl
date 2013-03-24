<?php

namespace Ffbl\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('FfblMainBundle:Default:index.html.twig');
    }
}
