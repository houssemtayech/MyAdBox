<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\ActionTimelaps;
use AdBoxBundle\Form\ActionTimelapsType;

/**
 * ActionTimelaps controller.
 *
 * @Route("/actiontimelaps")
 */
class ActionTimelapsController extends Controller
{
    /**
     * Lists all ActionTimelaps entities.
     *
     * @Route("/", name="actiontimelaps_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actionTimelaps = $em->getRepository('AdBoxBundle:ActionTimelaps')->findAll();

        return $this->render('actiontimelaps/index.html.twig', array(
            'actionTimelaps' => $actionTimelaps,
        ));
    }

    /**
     * Creates a new ActionTimelaps entity.
     *
     * @Route("/new", name="actiontimelaps_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $actionTimelap = new ActionTimelaps();
        $form = $this->createForm('AdBoxBundle\Form\ActionTimelapsType', $actionTimelap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actionTimelap);
            $em->flush();

            return $this->redirectToRoute('actiontimelaps_show', array('id' => $actionTimelap->getId()));
        }

        return $this->render('actiontimelaps/new.html.twig', array(
            'actionTimelap' => $actionTimelap,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ActionTimelaps entity.
     *
     * @Route("/{id}", name="actiontimelaps_show")
     * @Method("GET")
     */
    public function showAction(ActionTimelaps $actionTimelap)
    {
        $deleteForm = $this->createDeleteForm($actionTimelap);

        return $this->render('actiontimelaps/show.html.twig', array(
            'actionTimelap' => $actionTimelap,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ActionTimelaps entity.
     *
     * @Route("/{id}/edit", name="actiontimelaps_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ActionTimelaps $actionTimelap)
    {
        $deleteForm = $this->createDeleteForm($actionTimelap);
        $editForm = $this->createForm('AdBoxBundle\Form\ActionTimelapsType', $actionTimelap);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actionTimelap);
            $em->flush();

            return $this->redirectToRoute('actiontimelaps_edit', array('id' => $actionTimelap->getId()));
        }

        return $this->render('actiontimelaps/edit.html.twig', array(
            'actionTimelap' => $actionTimelap,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ActionTimelaps entity.
     *
     * @Route("/{id}", name="actiontimelaps_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ActionTimelaps $actionTimelap)
    {
        $form = $this->createDeleteForm($actionTimelap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actionTimelap);
            $em->flush();
        }

        return $this->redirectToRoute('actiontimelaps_index');
    }

    /**
     * Creates a form to delete a ActionTimelaps entity.
     *
     * @param ActionTimelaps $actionTimelap The ActionTimelaps entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ActionTimelaps $actionTimelap)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actiontimelaps_delete', array('id' => $actionTimelap->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
