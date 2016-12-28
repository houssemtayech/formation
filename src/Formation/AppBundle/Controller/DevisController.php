<?php

namespace Formation\AppBundle\Controller;

use Formation\AppBundle\Entity\Devis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Devi controller.
 *
 * @Route("/")
 */
class DevisController extends Controller
{
    /**
     * Lists all devi entities.
     *
     * @Route("admin/devis", name="devis_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $devis = $em->getRepository('FormationAppBundle:Devis')->findAll();

        return $this->render('FormationAppBundle:Admin:devis.html.twig', array(
            'devis' => $devis,
        ));
    }

    /**
     * Creates a new devi entity.
     *
     * @Route("devis/new", name="devis_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $devi = new Devis();
        $form = $this->createForm('Formation\AppBundle\Form\DevisType', $devi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($devi);
            $em->flush($devi);

            return $this->redirectToRoute('contact_confirmation');
        }

        return $this->render('FormationAppBundle:Default:devis.html.twig', array(
            'devi' => $devi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a devi entity.
     *
     * @Route("admin/devis/{id}", name="devis_show")
     * @Method("GET")
     */
    public function showAction(Devis $devi)
    {
        $deleteForm = $this->createDeleteForm($devi);

        return $this->render('FormationAppBundle:Admin:devisDetail.html.twig', array(
            'devi' => $devi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing devi entity.
     *
     * @Route("admin/devis/{id}/edit", name="devis_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Devis $devi)
    {
        $deleteForm = $this->createDeleteForm($devi);
        $editForm = $this->createForm('Formation\AppBundle\Form\DevisType', $devi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('devis_edit', array('id' => $devi->getId()));
        }

        return $this->render('devis/edit.html.twig', array(
            'devi' => $devi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a devi entity.
     *
     * @Route("admin/devis/{id}", name="devis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Devis $devi)
    {
        $form = $this->createDeleteForm($devi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($devi);
            $em->flush($devi);
        }

        return $this->redirectToRoute('devis_index');
    }

    /**
     * Creates a form to delete a devi entity.
     *
     * @param Devis $devi The devi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Devis $devi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('devis_delete', array('id' => $devi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
