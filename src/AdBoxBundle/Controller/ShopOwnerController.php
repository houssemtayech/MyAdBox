<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\ShopOwner;
use AdBoxBundle\Form\ShopOwnerType;

/**
 * ShopOwner controller.
 *
 * @Route("/shopowner")
 */
class ShopOwnerController extends Controller
{
    /**
     * Lists all ShopOwner entities.
     *
     * @Route("/", name="shopowner_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $shopOwners = $em->getRepository('AdBoxBundle:ShopOwner')->findAll();

        return $this->render('shopowner/index.html.twig', array(
            'shopOwners' => $shopOwners,
        ));
    }

    /**
     * Creates a new ShopOwner entity.
     *
     * @Route("/new", name="shopowner_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $shopOwner = new ShopOwner();
        $form = $this->createForm('AdBoxBundle\Form\ShopOwnerType', $shopOwner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($shopOwner);
            $em->flush();

            return $this->redirectToRoute('shopowner_show', array('id' => $shopOwner->getId()));
        }

        return $this->render('shopowner/new.html.twig', array(
            'shopOwner' => $shopOwner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ShopOwner entity.
     *
     * @Route("/{id}", name="shopowner_show")
     * @Method("GET")
     */
    public function showAction(ShopOwner $shopOwner)
    {
        $deleteForm = $this->createDeleteForm($shopOwner);

        return $this->render('shopowner/show.html.twig', array(
            'shopOwner' => $shopOwner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ShopOwner entity.
     *
     * @Route("/{id}/edit", name="shopowner_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ShopOwner $shopOwner)
    {
        $deleteForm = $this->createDeleteForm($shopOwner);
        $editForm = $this->createForm('AdBoxBundle\Form\ShopOwnerType', $shopOwner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($shopOwner);
            $em->flush();

            return $this->redirectToRoute('shopowner_edit', array('id' => $shopOwner->getId()));
        }

        return $this->render('shopowner/edit.html.twig', array(
            'shopOwner' => $shopOwner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ShopOwner entity.
     *
     * @Route("/{id}", name="shopowner_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ShopOwner $shopOwner)
    {
        $form = $this->createDeleteForm($shopOwner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($shopOwner);
            $em->flush();
        }

        return $this->redirectToRoute('shopowner_index');
    }

    /**
     * Creates a form to delete a ShopOwner entity.
     *
     * @param ShopOwner $shopOwner The ShopOwner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ShopOwner $shopOwner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('shopowner_delete', array('id' => $shopOwner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
