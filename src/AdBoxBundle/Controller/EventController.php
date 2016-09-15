<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Event;
use AdBoxBundle\Form\EventType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Event controller.
 *
 * @Route("/event")
 */
class EventController extends Controller
{
    /**
     * Lists all Event entities.
     *
     * @Route("/", name="event_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('AdBoxBundle:Event')->findAll();

        return $this->render('event/index.html.twig', array(
            'events' => $events,
        ));
    }

    /**
     * Creates a new Event entity.
     *
     * @Route("/new", name="event_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm('AdBoxBundle\Form\EventType', $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_show', array('id' => $event->getId()));
        }

        return $this->render('event/new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Event entity.
     *
     * @Route("/{id}", name="event_show")
     * @Method("GET")
     */
    public function showAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('event/show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Event entity.
     *
     * @Route("/{id}/edit", name="event_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm('AdBoxBundle\Form\EventType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('event_edit', array('id' => $event->getId()));
        }

        return $this->render('event/edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Event entity.
     *
     * @Route("/{id}", name="event_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Event $event)
    {
        $form = $this->createDeleteForm($event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($event);
            $em->flush();
        }

        return $this->redirectToRoute('event_index');
    }

    /**
     * Creates a form to delete a Event entity.
     *
     * @param Event $event The Event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('event_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function getTimeLapsesReservationAction(Request $request)
    {
      $encoders = array(new XmlEncoder(), new JsonEncoder());
      $normalizers = array(new ObjectNormalizer());
      $serializer = new Serializer($normalizers, $encoders);

      $id=$request->get('id');
      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder()
              ->select('t')
              ->from('AdBoxBundle:Timelaps', 't')
              ->innerJoin('AdBoxBundle:EventTimelaps', 'et', 'WITH', 'et.idTimelaps = t.id')
              ->innerJoin('AdBoxBundle:Event', 'e', 'WITH', 'e.id = et.idEvent')
              ->innerJoin('AdBoxBundle:Reservation','r','WITH','r.id =t.id')
              ->where('e.id = :id')
              ->andWhere('t.etat= :isEnabled')
              ->andWhere('r.idClient= :client')
              ->setParameter('id', $id)
              ->setParameter('isEnabled', true)
              ->setParameter('client', null)
              ->getQuery();
      $Timelapsitems = $qb->getResult();

      $jsonContent = $serializer->serialize($Timelapsitems, 'json');
      return new Response( $jsonContent);
    }

    /**
     * get Available Events By adresse and shops
     *
     * @Route("/adress", name="getAvailableEventByAdressAndShops")
     * @Method("POST")
     */
    public function getEventsByAdresseAction(Request $request)
    {
      $encoders = array(new XmlEncoder(), new JsonEncoder());
      $normalizers = array(new ObjectNormalizer());
      $serializer = new Serializer($normalizers, $encoders);
      $country=$request->get('country');
      $city=$request->get('city');
      $region=$request->get('region');
      $shop=$request->get('shop');
      $em = $this->getDoctrine()->getManager();
      $qb = $em->createQueryBuilder()
              ->select('e As event,s.name As shop')
              ->from('AdBoxBundle:Event', 'e')
              ->innerJoin('AdBoxBundle:EventTimelaps', 'et', 'WITH', 'et.idEvent = e.id')
              ->innerJoin('AdBoxBundle:Timelaps', 't', 'WITH', 'et.idTimelaps = t.id')
              ->innerJoin('AdBoxBundle:Adresse', 'a', 'WITH', 'a.id = t.idPointpub')
              ->innerJoin('AdBoxBundle:Shop', 's', 'WITH', 's.id = t.idPointpub')
              ->where('a.pays = :country')
              ->andWhere('a.ville= :city')
              ->andWhere('a.region= :region')
              ->andWhere('t.idPointpub IN (:shop)')
              ->andWhere('e.status= :es')
              ->andWhere('t.etat= :et')
              ->setParameter('country', $country)
              ->setParameter('city', $city)
              ->setParameter('region', $region)
              ->setParameter('shop', json_decode($shop))
              ->setParameter('es', true)
              ->setParameter('et', true)
              ->getQuery();
      $Timelapsitems = $qb->getResult();

      $jsonContent = $serializer->serialize($Timelapsitems, 'json');
      return new Response( $jsonContent);
    }
}
