<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\BidClient;
use AdBoxBundle\Form\BidClientType;

/**
 * BidClient controller.
 *
 * @Route("/bidclient")
 */
class BidClientController extends Controller
{
    /**
     * Lists all BidClient entities.
     *
     * @Route("/", name="bidclient_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bidClients = $em->getRepository('AdBoxBundle:BidClient')->findAll();

        return $this->render('bidclient/index.html.twig', array(
            'bidClients' => $bidClients,
        ));
    }

    /**
     * Creates a new BidClient entity.
     *
     * @Route("/new", name="bidclient_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bidClient = new BidClient();
        $form = $this->createForm('AdBoxBundle\Form\BidClientType', $bidClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bidClient);
            $em->flush();

            return $this->redirectToRoute('bidclient_show', array('id' => $bidClient->getId()));
        }

        return $this->render('bidclient/new.html.twig', array(
            'bidClient' => $bidClient,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BidClient entity.
     *
     * @Route("/{id}", name="bidclient_show")
     * @Method("GET")
     */
    public function showAction(BidClient $bidClient)
    {
        $deleteForm = $this->createDeleteForm($bidClient);

        return $this->render('bidclient/show.html.twig', array(
            'bidClient' => $bidClient,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing BidClient entity.
     *
     * @Route("/{id}/edit", name="bidclient_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BidClient $bidClient)
    {
        $deleteForm = $this->createDeleteForm($bidClient);
        $editForm = $this->createForm('AdBoxBundle\Form\BidClientType', $bidClient);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bidClient);
            $em->flush();

            return $this->redirectToRoute('bidclient_edit', array('id' => $bidClient->getId()));
        }

        return $this->render('bidclient/edit.html.twig', array(
            'bidClient' => $bidClient,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BidClient entity.
     *
     * @Route("/{id}", name="bidclient_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BidClient $bidClient)
    {
        $form = $this->createDeleteForm($bidClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bidClient);
            $em->flush();
        }

        return $this->redirectToRoute('bidclient_index');
    }

    /**
     * Creates a form to delete a BidClient entity.
     *
     * @param BidClient $bidClient The BidClient entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BidClient $bidClient)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bidclient_delete', array('id' => $bidClient->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
