<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03/12/16
 * Time: 09:51 م
 */

namespace Formation\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class ErrorController extends Controller
{
    public function indexAction()
    {

        return $this->render('FormationAppBundle:Default:404.html.twig');

    }
}