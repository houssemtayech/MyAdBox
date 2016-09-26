<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Bid;
use AdBoxBundle\Entity\BidClient;
use AdBoxBundle\Form\BidType;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Bid controller.
 *
 * @Route("/bid")
 */
class BidController extends Controller
{
    /**
     * Lists all Bid entities.
     *
     * @Route("/", name="bid_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bids = $em->getRepository('AdBoxBundle:Bid')->findAll();

        return $this->render('bid/index.html.twig', array(
            'bids' => $bids
        ));
    }

    /**
     * Creates a new Bid entity.
     *
     * @Route("/new", name="bid_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bid  = new Bid();
        $form = $this->createForm('AdBoxBundle\Form\BidType', $bid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bid);
            $em->flush();

            return $this->redirectToRoute('bid_show', array(
                'id' => $bid->getId()
            ));
        }

        return $this->render('bid/new.html.twig', array(
            'bid' => $bid,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a Bid entity.
     *
     * @Route("/{id}", name="bid_show")
     * @Method("GET")
     */
    public function showAction(Bid $bid)
    {
        $deleteForm = $this->createDeleteForm($bid);

        return $this->render('bid/show.html.twig', array(
            'bid' => $bid,
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Bid entity.
     *
     * @Route("/{id}/edit", name="bid_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Bid $bid)
    {
        $deleteForm = $this->createDeleteForm($bid);
        $editForm   = $this->createForm('AdBoxBundle\Form\BidType', $bid);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bid);
            $em->flush();

            return $this->redirectToRoute('bid_edit', array(
                'id' => $bid->getId()
            ));
        }

        return $this->render('bid/edit.html.twig', array(
            'bid' => $bid,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Deletes a Bid entity.
     *
     * @Route("/{id}", name="bid_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Bid $bid)
    {
        $form = $this->createDeleteForm($bid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bid);
            $em->flush();
        }

        return $this->redirectToRoute('bid_index');
    }


    /**
     * Creates a form to delete a Bid entity.
     *
     * @param Bid $bid The Bid entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bid $bid)
    {
        return $this->createFormBuilder()->setAction($this->generateUrl('bid_delete', array(
            'id' => $bid->getId()
        )))->setMethod('DELETE')->getForm();
    }

    /**
     * update a Bid entity.
     *
     * @Route("/update/bid", name="new_bid_client")
     * @Method("POST")
     */
    public function newBidClientAction(Request $request)
    {
        try{
          $em = $this->getDoctrine()->getManager();
          // TODO: Change it with current session id
            $user_id=$request->get("client");
            $id      = $request->get("id");
            $price   = $request->get("price");
            $timestamp =$request->get("timestamp");
            $bid = $em->getRepository('AdBoxBundle:Bid')->find($id);
            $timeslaps = $em->getRepository('AdBoxBundle:Timelaps')->find($id);
            $client = $em->getRepository('AdBoxBundle:Client')->find($user_id);

            if ($timeslaps->getPrix()>$price)
            {
              return new Response( Response::HTTP_NOT_FOUND);
            }

            $bid_client =new BidClient();

            $bid_client->setIdBid($bid);
            $bid_client->setIdClient($client);
            $bid_client->setPrice($price);
            $date=\DateTime::createFromFormat('Y-m-d H:i:s', $timestamp);
            $bid_client->setTimestamp($date);
            $timeslaps->setPrix($price);
            $em->persist($bid_client);
            $em->persist($timeslaps);
            $em->flush();
            return new Response( Response::HTTP_OK);
        }
        catch(Exception $e){
          return new Response( Response::HTTP_NOT_FOUND);

        }
    }
}
