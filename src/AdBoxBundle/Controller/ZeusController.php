<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Zeus;
use AdBoxBundle\Form\ZeusType;

/**
 * Zeus controller.
 *
 * @Route("/zeus")
 */
class ZeusController extends Controller
{
    /**
     * Lists all Zeus entities.
     *
     * @Route("/", name="zeus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $zeuses = $em->getRepository('AdBoxBundle:Zeus')->findAll();

        return $this->render('zeus/index.html.twig', array(
            'zeuses' => $zeuses,
        ));
    }

    /**
     * Creates a new Zeus entity.
     *
     * @Route("/new", name="zeus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $zeus = new Zeus();
        $form = $this->createForm('AdBoxBundle\Form\ZeusType', $zeus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zeus);
            $em->flush();

            return $this->redirectToRoute('zeus_show', array('id' => $zeus->getId()));
        }

        return $this->render('zeus/new.html.twig', array(
            'zeus' => $zeus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Zeus entity.
     *
     * @Route("/{id}", name="zeus_show")
     * @Method("GET")
     */
    public function showAction(Zeus $zeus)
    {
        $deleteForm = $this->createDeleteForm($zeus);

        return $this->render('zeus/show.html.twig', array(
            'zeus' => $zeus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Zeus entity.
     *
     * @Route("/{id}/edit", name="zeus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Zeus $zeus)
    {
        $deleteForm = $this->createDeleteForm($zeus);
        $editForm = $this->createForm('AdBoxBundle\Form\ZeusType', $zeus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($zeus);
            $em->flush();

            return $this->redirectToRoute('zeus_edit', array('id' => $zeus->getId()));
        }

        return $this->render('zeus/edit.html.twig', array(
            'zeus' => $zeus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Zeus entity.
     *
     * @Route("/{id}", name="zeus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Zeus $zeus)
    {
        $form = $this->createDeleteForm($zeus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($zeus);
            $em->flush();
        }

        return $this->redirectToRoute('zeus_index');
    }

    /**
     * Creates a form to delete a Zeus entity.
     *
     * @param Zeus $zeus The Zeus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Zeus $zeus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('zeus_delete', array('id' => $zeus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
