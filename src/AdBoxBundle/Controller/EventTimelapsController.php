<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\EventTimelaps;
use AdBoxBundle\Form\EventTimelapsType;

/**
 * EventTimelaps controller.
 *
 * @Route("/eventtimelaps")
 */
class EventTimelapsController extends Controller
{
    /**
     * Lists all EventTimelaps entities.
     *
     * @Route("/", name="eventtimelaps_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $eventTimelaps = $em->getRepository('AdBoxBundle:EventTimelaps')->findAll();

        return $this->render('eventtimelaps/index.html.twig', array(
            'eventTimelaps' => $eventTimelaps,
        ));
    }

    /**
     * Creates a new EventTimelaps entity.
     *
     * @Route("/new", name="eventtimelaps_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $eventTimelap = new EventTimelaps();
        $form = $this->createForm('AdBoxBundle\Form\EventTimelapsType', $eventTimelap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eventTimelap);
            $em->flush();

            return $this->redirectToRoute('eventtimelaps_show', array('id' => $eventTimelap->getId()));
        }

        return $this->render('eventtimelaps/new.html.twig', array(
            'eventTimelap' => $eventTimelap,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EventTimelaps entity.
     *
     * @Route("/{id}", name="eventtimelaps_show")
     * @Method("GET")
     */
    public function showAction(EventTimelaps $eventTimelap)
    {
        $deleteForm = $this->createDeleteForm($eventTimelap);

        return $this->render('eventtimelaps/show.html.twig', array(
            'eventTimelap' => $eventTimelap,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EventTimelaps entity.
     *
     * @Route("/{id}/edit", name="eventtimelaps_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, EventTimelaps $eventTimelap)
    {
        $deleteForm = $this->createDeleteForm($eventTimelap);
        $editForm = $this->createForm('AdBoxBundle\Form\EventTimelapsType', $eventTimelap);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($eventTimelap);
            $em->flush();

            return $this->redirectToRoute('eventtimelaps_edit', array('id' => $eventTimelap->getId()));
        }

        return $this->render('eventtimelaps/edit.html.twig', array(
            'eventTimelap' => $eventTimelap,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a EventTimelaps entity.
     *
     * @Route("/{id}", name="eventtimelaps_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, EventTimelaps $eventTimelap)
    {
        $form = $this->createDeleteForm($eventTimelap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eventTimelap);
            $em->flush();
        }

        return $this->redirectToRoute('eventtimelaps_index');
    }

    /**
     * Creates a form to delete a EventTimelaps entity.
     *
     * @param EventTimelaps $eventTimelap The EventTimelaps entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(EventTimelaps $eventTimelap)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('eventtimelaps_delete', array('id' => $eventTimelap->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
