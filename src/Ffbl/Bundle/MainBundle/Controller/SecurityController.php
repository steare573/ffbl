<?
namespace Ffbl\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
class SecurityController extends Controller
{
    public function indexAction()
    {

        return $this->render('FfblMainBundle:Default:index.html.twig');
    }

    public function loginAction()
    {
    	$request = $this->getRequest();
    	$session = $request->getSession();

    	if($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)){
    		$error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    	} else{
    		$error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
    		$session->remove(SecurityContext::AUTHENTICATION_ERROR);
    	}

    	return $this->render('FfblMainBundle:Security:login.html.twig'
    		 ,array('last_username' => $session->get(SecurityContext::LAST_USERNAME), 'error' => $error));
    }

    public function unauthorizedAction(){
        return $this->render('FfblMainBundle:Security:unauthorized.html.twig');
    }
}