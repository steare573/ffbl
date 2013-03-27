<?php

namespace Ffbl\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('FfblAdminBundle:User:index.html.twig');
    }
}