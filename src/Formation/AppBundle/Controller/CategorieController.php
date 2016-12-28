<?php

namespace Formation\AppBundle\Controller;

use Formation\AppBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
/**
 * Categorie controller.
 *
 * @Route("/")
 */
class CategorieController extends Controller
{


    
    /**
     * Lists all categorie entities.
     *
     * @Route("/categorieListIndex", name="categorie_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('FormationAppBundle:Categorie')->findAll();

        return $this->render('FormationAppBundle:Template:categorieListIndex.html.twig', array(
            'categories' => $categories,
        ));
       
    }

    /**
     * Lists all categorie entities.
     *
     * @Route("/admin/categorie", name="categorie_adminindex")
     * @Method("GET")
     */
    public function listCategorieAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('FormationAppBundle:Categorie')->findAll();

        return $this->render('FormationAppBundle:Admin:categorie.html.twig', array(
            'categories' => $categories,
        ));

    }

    /**
     * Lists all categorie entities.
     *
     * @Route("/layout", name="categorie_layout")
     * @Method("GET")
     */
    public function layoutAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('FormationAppBundle:Categorie')->findAll();

        return $this->render('FormationAppBundle::categorie.html.twig', array(
            'categories' => $categories,
        ));

    }

    /**
     * Creates a new categorie entity.
     *
     * @Route("/admin/categorie/new", name="categorie_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categorie = new Categorie();
        $form = $this->createForm('Formation\AppBundle\Form\CategorieType', $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $image = $categorie->getImage();


            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$image->guessExtension();
            $fileName = $this->get('app.image_uploader')->upload($image);
            // Move the file to the directory where brochures are stored
            

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $categorie->setImage($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush($categorie);

            return $this->redirectToRoute('categorie_show', array('id' => $categorie->getId()));
        }

        return $this->render('FormationAppBundle:Admin:newCategorie.html.twig', array(
            'categorie' => $categorie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorie entity.
     *
     * @Route("/admin/categorie/{id}", name="categorie_show")
     * @Method("GET")
     */
    public function showAction(Categorie $categorie)
    {
        $deleteForm = $this->createDeleteForm($categorie);

        return $this->render('FormationAppBundle:Admin:detailCategorie.html.twig', array(
            'categorie' => $categorie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorie entity.
     *
     * @Route("/categorie/{id}/edit", name="categorie_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Categorie $categorie)
    {
        $deleteForm = $this->createDeleteForm($categorie);
        $editForm = $this->createForm('Formation\AppBundle\Form\CategorieType', $categorie);
        $editForm->handleRequest($request);
        $categorie->setImage(
            new File($this->getParameter('images_directory').'/'.$categorie->getImage())
        );

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorie_edit', array('id' => $categorie->getId()));
        }

        return $this->render('FormationAppBundle:Admin:editCategorie.html.twig', array(
            'categorie' => $categorie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorie entity.
     *
     * @Route("/categorie/{id}", name="categorie_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Categorie $categorie)
    {
        $form = $this->createDeleteForm($categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorie);
            $em->flush($categorie);
        }

        return $this->redirectToRoute('categorie_index');
    }

    /**
     * Creates a form to delete a categorie entity.
     *
     * @param Categorie $categorie The categorie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Categorie $categorie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorie_delete', array('id' => $categorie->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
