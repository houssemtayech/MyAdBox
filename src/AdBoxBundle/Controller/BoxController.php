<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Box;
use AdBoxBundle\Form\BoxType;

/**
 * Box controller.
 *
 * @Route("/box")
 */
class BoxController extends Controller
{
    /**
     * Lists all Box entities.
     *
     * @Route("/", name="box_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $boxes = $em->getRepository('AdBoxBundle:Box')->findAll();

        return $this->render('box/index.html.twig', array(
            'boxes' => $boxes,
        ));
    }

    /**
     * Creates a new Box entity.
     *
     * @Route("/new", name="box_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $box = new Box();
        $form = $this->createForm('AdBoxBundle\Form\BoxType', $box);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($box);
            $em->flush();

            return $this->redirectToRoute('box_show', array('id' => $box->getId()));
        }

        return $this->render('box/new.html.twig', array(
            'box' => $box,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Box entity.
     *
     * @Route("/{id}", name="box_show")
     * @Method("GET")
     */
    public function showAction(Box $box)
    {
        $deleteForm = $this->createDeleteForm($box);

        return $this->render('box/show.html.twig', array(
            'box' => $box,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Box entity.
     *
     * @Route("/{id}/edit", name="box_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Box $box)
    {
        $deleteForm = $this->createDeleteForm($box);
        $editForm = $this->createForm('AdBoxBundle\Form\BoxType', $box);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($box);
            $em->flush();

            return $this->redirectToRoute('box_edit', array('id' => $box->getId()));
        }

        return $this->render('box/edit.html.twig', array(
            'box' => $box,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Box entity.
     *
     * @Route("/{id}", name="box_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Box $box)
    {
        $form = $this->createDeleteForm($box);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($box);
            $em->flush();
        }

        return $this->redirectToRoute('box_index');
    }

    /**
     * Creates a form to delete a Box entity.
     *
     * @param Box $box The Box entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Box $box)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('box_delete', array('id' => $box->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
