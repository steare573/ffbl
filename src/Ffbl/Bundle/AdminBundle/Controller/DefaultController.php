<?php

namespace Ffbl\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FfblAdminBundle:Default:index.html.twig');
    }
}
