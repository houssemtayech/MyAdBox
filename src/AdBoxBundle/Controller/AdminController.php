<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Admin;
use AdBoxBundle\Form\AdminType;
use AdBoxBundle\Form\EditAdminForm;
/**
 * Admin controller.
 *
 * @Route("/adminTest")
 */
class AdminController extends Controller
{
    /**
     * Lists all Admin entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('AdBoxBundle:Admin')->findAll();

        return $this->render('AdBoxBundle:Admin:index.html.twig', array(
            'admins' => $admins,
        ));
    }
    function CalendarAction (){
        
        return $this-> render('AdBoxBundle:Admin:calendar.html.twig');
          
    }

    /**
     * Creates a new Admin entity.
     *
     * @Route("/new", name="admin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $admin = new Admin();
        $form = $this->createForm('AdBoxBundle\Form\AdminType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin_show', array('id' => $admin->getId()));
        }

        return $this->render('admin/new.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Admin entity.
     *
     * @Route("/{id}", name="admin_show")
     * @Method("GET")
     */
    public function showAction(Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);

        return $this->render('admin/show.html.twig', array(
            'admin' => $admin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Admin entity.
     *
     * @Route("/{id}/edit", name="admin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);
        $editForm = $this->createForm('AdBoxBundle\Form\AdminType', $admin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin_edit', array('id' => $admin->getId()));
        }

        return $this->render('admin/edit.html.twig', array(
            'admin' => $admin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Admin entity.
     *
     * @Route("/{id}", name="admin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Admin $admin)
    {
        $form = $this->createDeleteForm($admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($admin);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a Admin entity.
     *
     * @param Admin $admin The Admin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Admin $admin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $admin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function listAllAdminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $roles = "ROLE_ADMIN";
        $query = $em -> createQuery('select A from AdBoxBundle:User A where A.roles like :roles ')
                ->setParameter ('roles','%'. $roles .'%');
       // $users = $em->getRepository('AdBoxBundle:Admin')->findAll();
        $users = $query ->getResult();
        
        return $this->render('AdBoxBundle:Admin:allAdmins.html.twig', array(
            'users' => $users,
        ));
    }
    
    public function editAdminAction($id) {
        $em = $this->container->get('doctrine')->getEntityManager();
        $Admin = $em->getRepository('AdBoxBundle:Admin')->find($id);
        $form = $this->createform(new EditAdminForm(), $Admin);
        //assigner les données saisies par l'user à l'objet modele
        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->container->get('Doctrine')->getEntityManager();
                $em->persist($Admin);
                $em->flush();
                return $this->render('AdBoxBundle:Admin:succes.html.twig', array('msg' => 'Mise à jour affectuée avec succès'));
            }
        } return $this->render('AdBoxBundle:Admin:editAdmin.html.twig', array('Form' => $form->createView()));
    }
}
