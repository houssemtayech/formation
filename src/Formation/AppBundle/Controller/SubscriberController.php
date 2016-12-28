<?php

namespace Formation\AppBundle\Controller;

use Formation\AppBundle\Entity\Subscriber;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Subscriber controller.
 *
 * @Route("/")
 */
class SubscriberController extends Controller
{
    /**
     * Lists all subscriber entities.
     *
     * @Route("admin/subscriber", name="subscriber_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $subscribers = $em->getRepository('FormationAppBundle:Subscriber')->findAll();

        return $this->render('FormationAppBundle:Admin:subscribers.html.twig', array(
            'subscribers' => $subscribers,
        ));
    }


    /**
     * Creates a new subscriber entity.
     *
     * @Route("subscriber/new", name="subscriber_new")
     * @Method({"GET", "POST"})
     */
    
    public function newAction(Request $request)
    {
        $subscriber = new Subscriber();
        $form = $this->createForm('Formation\AppBundle\Form\SubscriberType', $subscriber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($subscriber);
            $em->flush($subscriber);

            //return $this->redirectToRoute($this->generateUrl('formation_app_subs'));
        }

        return $this->render('FormationAppBundle:Template:subscribe.html.twig', array(
            'subscriber' => $subscriber,
            'formSubscriber' => $form->createView(),
        ));
    }

    

    /**
     * Finds and displays a subscriber entity.
     *
     * @Route("subscriber/{id}", name="subscriber_show")
     * @Method("GET")
     */
    public function showAction(Subscriber $subscriber)
    {
        $deleteForm = $this->createDeleteForm($subscriber);

        return $this->render('subscriber/show.html.twig', array(
            'subscriber' => $subscriber,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing subscriber entity.
     *
     * @Route("subscriber/{id}/edit", name="subscriber_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Subscriber $subscriber)
    {
        $deleteForm = $this->createDeleteForm($subscriber);
        $editForm = $this->createForm('Formation\AppBundle\Form\SubscriberType', $subscriber);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('subscriber_edit', array('id' => $subscriber->getId()));
        }

        return $this->render('subscriber/edit.html.twig', array(
            'subscriber' => $subscriber,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a subscriber entity.
     *
     * @Route("subscriber/{id}", name="subscriber_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Subscriber $subscriber)
    {
        $form = $this->createDeleteForm($subscriber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($subscriber);
            $em->flush($subscriber);
        }

        return $this->redirectToRoute('subscriber_index');
    }

    /**
     * Creates a form to delete a subscriber entity.
     *
     * @param Subscriber $subscriber The subscriber entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Subscriber $subscriber)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('subscriber_delete', array('id' => $subscriber->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
