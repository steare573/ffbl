<?php

namespace Ffbl\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    public function indexAction()
    {
        return $this->render('FfblAdminBundle:Player:index.html.twig');
    }
}