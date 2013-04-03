<?php

namespace Ffbl\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Ffbl\Bundle\MainBundle\Form\UserType;
use Ffbl\Bundle\MainBundle\Entity\User;
use Ffbl\Ajax\ResponseModel;

/**
 * Controller for all things dealing with admin tools/reports dealing with site users.
 *
 * @author Sean Teare <steare573@gmail.com>
 * @since 2013-04-02
 */
class UserController extends Controller
{
    /**
     * Action responsible for setting up the user admin main page
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('FfblAdminBundle:User:index.html.twig');
    }

    /**
     * Action responsible for setting up the user admin tool for adding/editing users
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function admintoolAction(){
    	return $this->render('FfblAdminBundle:User:admintool.html.twig');
    }
 
    /**
     * Action responsible for dealing with ajax requests for editing and adding users.
     *
     * If a userId is passed in the post request, it will populate the form with the appropriate user.
     * If none is passed in, it will allow the admin to create a new user.
     *
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function adminajaxAction(){

        /*
         * Initialize our ajax response model
         */
        $model = new ResponseModel();
        try{
        	$request = $this->get('request');
        	$action = $request->request->get('action');
            $userId = $request->request->get('userId');

            if(empty($userId)){
                $user = new User();
            } else{
                /*
                 * Load up user based on id passed in
                 */
                $user = $this->getDoctrine()->getRepository('FfblMainBundle:User')->find($userId);
            }
            /*
             * Create our form usin our UserType set up specifically for our user
             */
            $form = $this->createForm(
                    new UserType(),
                    $user
                );

        	
            $model->content = $this->renderView('FfblAdminBundle:User:edituser.html.twig', array('form' => $form->createView()));
            $model->success = true;
        } catch(Exception $e){
            $model->success = false;
        }

    	return new Response($model->toJson(), 200, array('Content-Type' => 'application/json'));
    }
}