<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\ShopOwner;
use AdBoxBundle\Form\ShopOwnerType;
use AdBoxBundle\Form\EditShopOwnerForm;

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
        public function listAllShopOwnerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $roles = "ROLE_ShopOwner";
        $query = $em -> createQuery('select A from AdBoxBundle:User A where A.roles like :roles ')
                ->setParameter ('roles','%'. $roles .'%');
       // $users = $em->getRepository('AdBoxBundle:Admin')->findAll();
        $users = $query ->getResult();
        
        return $this->render('AdBoxBundle:ShopOwner:allShopOwners.html.twig', array(
            'users' => $users,
        ));
    }
    
    public function editShopOwnerAction($id) {
        $em = $this->container->get('doctrine')->getEntityManager();
        $ShopOwner = $em->getRepository('AdBoxBundle:ShopOwner')->find($id);
        $form = $this->createform(new EditShopOwnerForm(), $ShopOwner);
        //assigner les données saisies par l'user à l'objet modele
        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->container->get('Doctrine')->getEntityManager();
                $em->persist($ShopOwner);
                $em->flush();
                return $this->render('AdBoxBundle:ShopOwner:succes.html.twig', array('msg' => 'Mise à jour affectuée avec succès'));
            }
        } return $this->render('AdBoxBundle:ShopOwner:editShopOwner.html.twig', array('Form' => $form->createView()));
    }
}
