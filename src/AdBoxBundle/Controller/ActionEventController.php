<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\ActionEvent;
use AdBoxBundle\Form\ActionEventType;

/**
 * ActionEvent controller.
 *
 * @Route("/actionevent")
 */
class ActionEventController extends Controller
{
    /**
     * Lists all ActionEvent entities.
     *
     * @Route("/", name="actionevent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actionEvents = $em->getRepository('AdBoxBundle:ActionEvent')->findAll();

        return $this->render('actionevent/index.html.twig', array(
            'actionEvents' => $actionEvents,
        ));
    }

    /**
     * Creates a new ActionEvent entity.
     *
     * @Route("/new", name="actionevent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $actionEvent = new ActionEvent();
        $form = $this->createForm('AdBoxBundle\Form\ActionEventType', $actionEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actionEvent);
            $em->flush();

            return $this->redirectToRoute('actionevent_show', array('id' => $actionEvent->getId()));
        }

        return $this->render('actionevent/new.html.twig', array(
            'actionEvent' => $actionEvent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ActionEvent entity.
     *
     * @Route("/{id}", name="actionevent_show")
     * @Method("GET")
     */
    public function showAction(ActionEvent $actionEvent)
    {
        $deleteForm = $this->createDeleteForm($actionEvent);

        return $this->render('actionevent/show.html.twig', array(
            'actionEvent' => $actionEvent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ActionEvent entity.
     *
     * @Route("/{id}/edit", name="actionevent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ActionEvent $actionEvent)
    {
        $deleteForm = $this->createDeleteForm($actionEvent);
        $editForm = $this->createForm('AdBoxBundle\Form\ActionEventType', $actionEvent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actionEvent);
            $em->flush();

            return $this->redirectToRoute('actionevent_edit', array('id' => $actionEvent->getId()));
        }

        return $this->render('actionevent/edit.html.twig', array(
            'actionEvent' => $actionEvent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ActionEvent entity.
     *
     * @Route("/{id}", name="actionevent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ActionEvent $actionEvent)
    {
        $form = $this->createDeleteForm($actionEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actionEvent);
            $em->flush();
        }

        return $this->redirectToRoute('actionevent_index');
    }

    /**
     * Creates a form to delete a ActionEvent entity.
     *
     * @param ActionEvent $actionEvent The ActionEvent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ActionEvent $actionEvent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actionevent_delete', array('id' => $actionEvent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
