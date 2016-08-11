<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Action;
use AdBoxBundle\Form\ActionType;

/**
 * Action controller.
 *
 * @Route("/action")
 */
class ActionController extends Controller
{
    /**
     * Lists all Action entities.
     *
     * @Route("/", name="action_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actions = $em->getRepository('AdBoxBundle:Action')->findAll();

        return $this->render('action/index.html.twig', array(
            'actions' => $actions,
        ));
    }

    /**
     * Creates a new Action entity.
     *
     * @Route("/new", name="action_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $action = new Action();
        $form = $this->createForm('AdBoxBundle\Form\ActionType', $action);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($action);
            $em->flush();

            return $this->redirectToRoute('action_show', array('id' => $action->getId()));
        }

        return $this->render('action/new.html.twig', array(
            'action' => $action,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Action entity.
     *
     * @Route("/{id}", name="action_show")
     * @Method("GET")
     */
    public function showAction(Action $action)
    {
        $deleteForm = $this->createDeleteForm($action);

        return $this->render('action/show.html.twig', array(
            'action' => $action,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Action entity.
     *
     * @Route("/{id}/edit", name="action_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Action $action)
    {
        $deleteForm = $this->createDeleteForm($action);
        $editForm = $this->createForm('AdBoxBundle\Form\ActionType', $action);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($action);
            $em->flush();

            return $this->redirectToRoute('action_edit', array('id' => $action->getId()));
        }

        return $this->render('action/edit.html.twig', array(
            'action' => $action,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Action entity.
     *
     * @Route("/{id}", name="action_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Action $action)
    {
        $form = $this->createDeleteForm($action);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($action);
            $em->flush();
        }

        return $this->redirectToRoute('action_index');
    }

    /**
     * Creates a form to delete a Action entity.
     *
     * @param Action $action The Action entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Action $action)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('action_delete', array('id' => $action->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
