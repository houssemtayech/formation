<?php

namespace Formation\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
      
        return $this->render('FormationAppBundle:Default:index.html.twig');

    }



    public function adminAction()
    {
        return $this->render('FormationAppBundle:Admin:index.html.twig');
    }

    public function demandeurEmploiAction()
    {
        return $this->render('FormationAppBundle:Default:demandeur-d-emploi.html.twig');
    }

    public function deroulementFormationAction()
    {
        return $this->render('FormationAppBundle:Default:deroulement-d-une-formation.html.twig');
    }

    public function formationIntraAction()
    {
        return $this->render('FormationAppBundle:Default:formation-intra.html.twig');
    }

    public function formationMesureAction()
    {
        return $this->render('FormationAppBundle:Default:formation-sur-mesure.html.twig');
    }

    public function grandeEntrepriseAction()
    {
        return $this->render('FormationAppBundle:Default:grande-entreprise.html.twig');
    }

    public function pmeAction()
    {
        return $this->render('FormationAppBundle:Default:pme.html.twig');
    }

    public function eLearningAction()
    {
        return $this->render('FormationAppBundle:Default:e-learning.html.twig');
    }
    public function contactProAction()
    {
        return $this->render('FormationAppBundle:Default:contact-pro.html.twig');
    }
    

}
