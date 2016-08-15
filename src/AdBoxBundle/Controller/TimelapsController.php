<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Timelaps;
use AdBoxBundle\Form\TimelapsType;

/**
 * Timelaps controller.
 *
 * @Route("/timelaps")
 */
class TimelapsController extends Controller
{
    /**
     * Lists all Timelaps entities.
     *
     * @Route("/", name="timelaps_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $timelaps = $em->getRepository('AdBoxBundle:Timelaps')->findAll();

        return $this->render('timelaps/index.html.twig', array(
            'timelaps' => $timelaps,
        ));
    }

    /**
     * Creates a new Timelaps entity.
     *
     * @Route("/new", name="timelaps_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $timelap = new Timelaps();
        $form = $this->createForm('AdBoxBundle\Form\TimelapsType', $timelap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($timelap);
            $em->flush();

            return $this->redirectToRoute('timelaps_show', array('id' => $timelap->getId()));
        }

        return $this->render('timelaps/new.html.twig', array(
            'timelap' => $timelap,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Timelaps entity.
     *
     * @Route("/{id}", name="timelaps_show")
     * @Method("GET")
     */
    public function showAction(Timelaps $timelap)
    {
        $deleteForm = $this->createDeleteForm($timelap);

        return $this->render('timelaps/show.html.twig', array(
            'timelap' => $timelap,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Timelaps entity.
     *
     * @Route("/{id}/edit", name="timelaps_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Timelaps $timelap)
    {
        $deleteForm = $this->createDeleteForm($timelap);
        $editForm = $this->createForm('AdBoxBundle\Form\TimelapsType', $timelap);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($timelap);
            $em->flush();

            return $this->redirectToRoute('timelaps_edit', array('id' => $timelap->getId()));
        }

        return $this->render('timelaps/edit.html.twig', array(
            'timelap' => $timelap,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Timelaps entity.
     *
     * @Route("/{id}", name="timelaps_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Timelaps $timelap)
    {
        $form = $this->createDeleteForm($timelap);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($timelap);
            $em->flush();
        }

        return $this->redirectToRoute('timelaps_index');
    }

    /**
     * Creates a form to delete a Timelaps entity.
     *
     * @param Timelaps $timelap The Timelaps entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Timelaps $timelap)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timelaps_delete', array('id' => $timelap->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
