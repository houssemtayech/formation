<?php

namespace Formation\AppBundle\Controller;

use Formation\AppBundle\Entity\Course;
use Formation\AppBundle\Entity\Inscription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Inscription controller.
 *
 * @Route("/")
 */
class InscriptionController extends Controller
{
    /**
     * Creates a new inscription entity.
     *
     * @Route("inscription/new/{id}", name="inscription_new")
     * @Method({"GET", "POST"})
     */
    public function ajoutAction($id){
        $cour = new Course();
        $em = $this->container->get('doctrine')->getEntityManager();

            $query = $em->createQuery('SELECT L FROM FormationAppBundle:Course L  WHERE L.id like :id')
                ->setParameter('id', '%' . $id . '%');
        $cour  = $query->getSingleResult();
        $inscription = new Inscription();
        $title = $cour-> getTitle();
        $price =  $cour-> getPrice();
        $code = $cour->  getCode();
        $date = $cour -> getDate();
        $inscription ->setTitleFormation($title);
        $inscription->setPrice($price);
        $inscription ->setDate($date);
        $inscription ->setCodeFormation($code);
        $form = $this->createForm('Formation\AppBundle\Form\InscriptionType', $inscription);
        $request= $this->getRequest();
        if ($request->getMethod()=="POST"){
            $form->bind($request);
            if ($form->isValid()){
                $em = $this->container->get('Doctrine')->getEntityManager();
                $em->persist($inscription);
                $em->flush();

            }
            //return $this->redirectToRoute('inscription_show', array('id' => $inscription->getId()));
        }
        return $this->render('FormationAppBundle:Default:inscription.html.twig', array(
            'inscription' => $inscription,
            'form' => $form->createView(),
        ));
    }
    /**
     * Lists all inscription entities.
     *
     * @Route("admin/inscription/", name="inscription_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $inscriptions = $em->getRepository('FormationAppBundle:Inscription')->findAll();

        return $this->render('FormationAppBundle:Admin:inscriptions.html.twig', array(
            'inscriptions' => $inscriptions,
        ));
    }

    /**
     * Creates a new inscription entity.
     *
     * @Route("inscription/new2", name="inscription_new2")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $inscription = new Inscription();
        $form = $this->createForm('Formation\AppBundle\Form\InscriptionType', $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inscription);
            $em->flush($inscription);

            return $this->redirectToRoute('inscription_show', array('id' => $inscription->getId()));
        }

        return $this->render('inscription/new.html.twig', array(
            'inscription' => $inscription,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a inscription entity.
     *
     * @Route("admin/inscription/{id}", name="inscription_show")
     * @Method("GET")
     */
    public function showAction(Inscription $inscription)
    {
        $deleteForm = $this->createDeleteForm($inscription);

        return $this->render('FormationAppBundle:Admin:inscriptionDetail.html.twig', array(
            'inscription' => $inscription,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing inscription entity.
     *
     * @Route("admin/inscription/{id}/edit", name="inscription_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Inscription $inscription)
    {
        $deleteForm = $this->createDeleteForm($inscription);
        $editForm = $this->createForm('Formation\AppBundle\Form\InscriptionType', $inscription);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('inscription_edit', array('id' => $inscription->getId()));
        }

        return $this->render('inscription/edit.html.twig', array(
            'inscription' => $inscription,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a inscription entity.
     *
     * @Route("admin/inscription/{id}", name="inscription_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Inscription $inscription)
    {
        $form = $this->createDeleteForm($inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($inscription);
            $em->flush($inscription);
        }

        return $this->redirectToRoute('inscription_index');
    }

    /**
     * Creates a form to delete a inscription entity.
     *
     * @param Inscription $inscription The inscription entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Inscription $inscription)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('inscription_delete', array('id' => $inscription->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
