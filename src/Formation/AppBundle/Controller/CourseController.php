<?php

namespace Formation\AppBundle\Controller;

use Formation\AppBundle\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Formation\AppBundle\Form\SearchCoursesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Formation\AppBundle\Entity\Tag;

/**
 * Course controller.
 *
 * @Route("/")
 */
class CourseController extends Controller
{
    /**
     * Lists all course entities.
     *
     * @Route("/course/search", name="course_search")
     *
     */
    
    public function typeaheadAction()
    {
        $course = new Course();
        $form = $this->createForm(new SearchCoursesType(),$course);
        $em = $this->getDoctrine()->getManager();
        $varArray ="";
        $courses = $em->getRepository('FormationAppBundle:Course')->findAll();
        foreach ($courses as $course)
        {
            $varArray[]= $course->getTitle();
        }
        /*
        $request = $this->getRequest();
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $data = $this->getRequest()->request->get('formation_appbundle_scourse');
                $course1 = $em->getRepository('FormationAppBundle:Course')->findOneByTitle($data);
                return $this->render('FormationAppBundle:Courses:course.html.twig', array('course' => $course1));
            }

        }

        */
        return $this->render('FormationAppBundle:Template:searchIndex.html.twig',
            array('form' => $form->createView(),
            'varArray' => $varArray));
    }
    /*
    public function searchAction()
    {
        $form = $this->createForm(new SearchCoursesType());
        $request = $this->getRequest();
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $data = $this->getRequest()->request->get('formation_appbundle_scourse');
                $courses = $em->getRepository('FormationAppBundle:Course')->findCoursesByParametres($data);
                return $this->render('FormationAppBundle:Courses:coursesList.html.twig', array('courses' => $courses));
            }
        }
        return $this->render('FormationAppBundle:Template:searchIndex.html.twig', array('form' => $form->createView()));
    }
    */
    /**
     * Lists all course entities.
     *
     * @Route("/admin/course", name="course_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('FormationAppBundle:Course')->findAll();
        

        return $this->render('FormationAppBundle:Admin:course.html.twig', array(
            'courses' => $courses,
        ));
    }

    /**
     * Lists all course entities.
     *
     * @Route("/admin/course/widget", name="course_widget")
     * @Method("GET")
     */
    public function widgetAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('FormationAppBundle:Course')->findBy(array(), array('date' => 'desc'));

        return $this->render('FormationAppBundle:Template:courseWidget.html.twig', array(
            'cour' => $courses,
        ));
    }
    /**
     * Lists all course entities.
     *
     * @Route("/admin/course/courseIndex", name="course_courseIndex")
     * @Method("GET")
     */
    public function courseIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('FormationAppBundle:Course')->findBy(array(), array('date' => 'desc'));

        return $this->render('FormationAppBundle:Template:courseIndex.html.twig', array(
            'cour1' => $courses,
        ));
    }

    /**
     * Lists all course by categorie.
     *
     * @Route("/course/{id}", name="course_categorie")
     * @Method("GET")
     */
    public function coursesCategorieAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository('FormationAppBundle:Categorie')->findOneById($id);
        $courses = $em->getRepository('FormationAppBundle:Course')->findByIdCategorie($id);

        return $this->render('FormationAppBundle:Courses:coursesList.html.twig', array(
            'courses' => $courses,
            'categorie' => $categorie,
        ));
    }



    /**
     * Creates a new course entity.
     *
     * @Route("/admin/course/new", name="course_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $course = new Course();

        $tag1 = new Tag();
        $tag1->setName('tag');
        $course->getTags()->add($tag1);

        $form = $this->createForm('Formation\AppBundle\Form\CourseType', $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $course->getBrochure();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $fileName = $this->get('app.brochure_uploader')->upload($file);
            // Move the file to the directory where brochures are stored
            

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $course->setBrochure($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush($course);

            return $this->redirectToRoute('course_show', array('id' => $course->getId()));
        }

        return $this->render('FormationAppBundle:Admin:addCourse.html.twig', array(
            'course' => $course,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a course entity.
     *
     * @Route("/course/details/{id}", name="course_show")
     * @Method({"GET","POST"})
     */
    public function showAction(Course $course)
    {
        $deleteForm = $this->createDeleteForm($course);
        $tagss = $course->getTags();
        return $this->render('FormationAppBundle:Courses:course.html.twig', array(
            'course' => $course,
            'tagss' => $tagss,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Finds and displays a course entity.
     *
     * @Route("/course/details", name="course_title")
     * @Method({"GET","POST"})
     */
    public function showTitleAction()
    {
        

        $em = $this->getDoctrine()->getManager();
        $title = $this->getRequest()->request->get('formation_appbundle_scourse');
        $course = $em->getRepository('FormationAppBundle:Course')->findOneByTitle($title);

        $tagss = $course->getTags();
        return $this->render('FormationAppBundle:Courses:course.html.twig', array(
            'course' => $course,
            'tagss' => $tagss,

        ));
    }
    /*
    public function showTitleAction($title)
    {

        $em = $this->getDoctrine()->getManager();

        $course = $em->getRepository('FormationAppBundle:Course')->findOneByTitle($title);
        $deleteForm = $this->createDeleteForm($course);
        $tagss = $course->getTags();
        return $this->render('FormationAppBundle:Courses:course.html.twig', array(
            'course' => $course,
            'tagss' => $tagss,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    */
    /**
     * Displays a form to edit an existing course entity.
     *
     * @Route("/course/{id}/edit", name="course_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Course $course)
    {
        $deleteForm = $this->createDeleteForm($course);
        $editForm = $this->createForm('Formation\AppBundle\Form\CourseType', $course);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('course_edit', array('id' => $course->getId()));
        }

        return $this->render('course/edit.html.twig', array(
            'course' => $course,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a course entity.
     *
     * @Route("/course/{id}", name="course_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Course $course)
    {
        $form = $this->createDeleteForm($course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($course);
            $em->flush($course);
        }

        return $this->redirectToRoute('course_index');
    }

    /**
     * Creates a form to delete a course entity.
     *
     * @param Course $course The course entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Course $course)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('course_delete', array('id' => $course->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
