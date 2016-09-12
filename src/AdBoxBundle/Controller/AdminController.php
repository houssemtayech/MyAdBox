<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Admin;
use AdBoxBundle\Form\AdminType;
use AdBoxBundle\Form\EditAdminForm;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Admin controller.
 *
 * @Route("/adminTest")
 */
class AdminController extends Controller
{
    /**
     * Lists all Admin entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $admins = $em->getRepository('AdBoxBundle:Admin')->findAll();

        return $this->render('AdBoxBundle:Admin:index.html.twig', array(
            'admins' => $admins,
        ));
    }
    function CalendarAction (){

        return $this-> render('AdBoxBundle:Admin:calendar.html.twig');

    }

    /**
     * Creates a new Admin entity.
     *
     * @Route("/new", name="admin_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $admin = new Admin();
        $form = $this->createForm('AdBoxBundle\Form\AdminType', $admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin_show', array('id' => $admin->getId()));
        }

        return $this->render('admin/new.html.twig', array(
            'admin' => $admin,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Admin entity.
     *
     * @Route("/{id}", name="admin_show")
     * @Method("GET")
     */
    public function showAction(Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);

        return $this->render('admin/show.html.twig', array(
            'admin' => $admin,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Admin entity.
     *
     * @Route("/{id}/edit", name="admin_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Admin $admin)
    {
        $deleteForm = $this->createDeleteForm($admin);
        $editForm = $this->createForm('AdBoxBundle\Form\AdminType', $admin);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($admin);
            $em->flush();

            return $this->redirectToRoute('admin_edit', array('id' => $admin->getId()));
        }

        return $this->render('admin/edit.html.twig', array(
            'admin' => $admin,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Admin entity.
     *
     * @Route("/{id}", name="admin_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Admin $admin)
    {
        $form = $this->createDeleteForm($admin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($admin);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a Admin entity.
     *
     * @param Admin $admin The Admin entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Admin $admin)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $admin->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function listAllAdminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $roles = "ROLE_ADMIN";
        $query = $em -> createQuery('select A from AdBoxBundle:User A where A.roles like :roles ')
                ->setParameter ('roles','%'. $roles .'%');
       // $users = $em->getRepository('AdBoxBundle:Admin')->findAll();
        $users = $query ->getResult();

        return $this->render('AdBoxBundle:Admin:allAdmins.html.twig', array(
            'users' => $users,
        ));
    }

    public function editAdminAction($id) {
        $em = $this->container->get('doctrine')->getEntityManager();
        $Admin = $em->getRepository('AdBoxBundle:Admin')->find($id);
        $form = $this->createform(new EditAdminForm(), $Admin);
        //assigner les données saisies par l'user à l'objet modele
        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->container->get('Doctrine')->getEntityManager();
                $em->persist($Admin);
                $em->flush();
                return $this->render('AdBoxBundle:Admin:succes.html.twig', array('msg' => 'Mise à jour affectuée avec succès'));
            }
        } return $this->render('AdBoxBundle:Admin:editAdmin.html.twig', array('Form' => $form->createView()));
    }

    /**
     * Admin ADs management
     *
     * @Route("/ads/Manage", name="admin_ad_manage")
     * @Method("GET")
     */
    public function AdManagementAction(){

      // rendering result
   return $this->render('AdBoxBundle:Admin:ads.html.twig');
    }

    /**
     * Admin ADs management loader
     *
     * @Route("/ads/Manage/loader", name="admin_ad_manage_loader")
     * @Method("POST")
     */
    public function AdManagementLoaderAction(Request $request){
      // get Current client id
      $session = new Session();
      $session->set('id', 1);
      $user_id = $session->get('id');

      $client=$request->get("client");
      $shop=$request->get("shop");
      $event=$request->get("event");


      // initialize tools
      $em = $this->getDoctrine()->getManager();
      // Ads query
      $qb = $em->createQueryBuilder()
              ->select('p,e.name')
              ->from('AdBoxBundle:Pub', 'p')
              ->innerJoin('AdBoxBundle:Timelaps', 't', 'WITH', 't.id = p.idTimelaps')
              ->innerJoin('AdBoxBundle:EventTimelaps', 'et', 'WITH', 'et.idTimelaps = p.idTimelaps')
              ->innerJoin('AdBoxBundle:Event', 'e', 'WITH', 'e.id = et.idEvent')
              ->innerJoin('AdBoxBundle:Shop', 's', 'WITH', 's.id = t.idPointpub')
              ->innerJoin('AdBoxBundle:Client', 'c', 'WITH', 'c.id = p.idUSer')
              ->where('c.id LIKE  :client_id')
              ->andWhere("e.id LIKE  :event_id")
              ->andWhere("s.id LIKE  :shop_id")
              ->andWhere('p.isArchieved = :archive')
              ->setParameter('client_id', "%".$client."%")
              ->setParameter('shop_id', "%".$shop."%")
              ->setParameter('event_id', "%".$event."%")
              ->setParameter('archive', 0)
              ->getQuery();
      $Adsitems = $qb->getResult();
      // rendering result
   return $this->render('AdBoxBundle:Admin:ads_loader.html.twig',array('ads' => $Adsitems));
    }

    /**
     * Lists all clients.
     *
     * @Route("/clients", name="admin_clients_get")
     * @Method("POST")
     */
    public function getAllClientsAction()
    {
      $encoders = array(new XmlEncoder(), new JsonEncoder());
      $normalizers = array(new ObjectNormalizer());
      $serializer = new Serializer($normalizers, $encoders);

      $em = $this->getDoctrine()->getManager();
      // Ads query
      $qb = $em->createQueryBuilder()
              ->select('c.id,c.username,c.email')
              ->from('AdBoxBundle:Client', 'c')
              ->getQuery();
      $clients = $qb->getResult();
      $jsonContent = $serializer->serialize($clients, 'json');

      // rendering result
    return new Response( $jsonContent);
    }
    /**
     * Lists all Shop.
     *
     * @Route("/shops", name="admin_shops_get")
     * @Method("POST")
     */
    public function getAllShopsAction()
    {
      $encoders = array(new XmlEncoder(), new JsonEncoder());
      $normalizers = array(new ObjectNormalizer());
      $serializer = new Serializer($normalizers, $encoders);

      $em = $this->getDoctrine()->getManager();
      // Ads query
      $qb = $em->createQueryBuilder()
              ->select('s.id,s.name,s.logo')
              ->from('AdBoxBundle:Shop', 's')
              ->getQuery();
      $shops = $qb->getResult();
      $jsonContent = $serializer->serialize($shops, 'json');

      // rendering result
    return new Response( $jsonContent);
    }
    /**
     * Lists all Events.
     *
     * @Route("/events", name="admin_events_get")
     * @Method("POST")
     */
    public function getAllEventsAction()
    {
      $encoders = array(new XmlEncoder(), new JsonEncoder());
      $normalizers = array(new ObjectNormalizer());
      $serializer = new Serializer($normalizers, $encoders);

      $em = $this->getDoctrine()->getManager();
      // Ads query
      $qb = $em->createQueryBuilder()
              ->select('e.id,e.name,e.eventType,e.starttime')
              ->from('AdBoxBundle:Event', 'e')
              ->getQuery();
      $events = $qb->getResult();

      $jsonContent = $serializer->serialize($events, 'json');

      // rendering result
    return new Response( $jsonContent);
    }
    /**
     * admin_ad_filter.
     *
     * @Route("/ads/search", name="admin_ad_filter")
     * @Method("POST")
     */
    public function ShowAdsFilterAction(Request $request) {


        $user_id = $request->get('id');

        $search = $request->get("search");
        $filter = $request->get("filter");

        switch ($filter) {
            case 'Shop':
                $filter = "t.idPointpub";
                break;
            case 'Date':
                $filter = "t.dateStart";
                break;
            case 'Price':
                $filter = "t.prix";
                break;
            case 'None':
                $filter = "p.id";
                break;
        }

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('p,e.name')
                ->from('AdBoxBundle:Pub', 'p')
                ->innerJoin('AdBoxBundle:Timelaps', 't', 'WITH', 't.id = p.idTimelaps')
                ->innerJoin('AdBoxBundle:EventTimelaps', 'et', 'WITH', 'et.idTimelaps = p.idTimelaps')
                ->innerJoin('AdBoxBundle:Event', 'e', 'WITH', 'e.id = et.idEvent')
                ->innerJoin('AdBoxBundle:Shop', 's', 'WITH', 's.id = t.idPointpub')
                ->where('p.idUSer = :id')
                ->andWhere('e.name Like :txt OR t.prix Like :txt OR s.name Like :txt')
                ->andWhere('p.isArchieved = :archive')
                ->orderBy($filter)
                ->setParameter('id', $user_id)
                ->setParameter('archive', 0)
                ->setParameter('txt', "%" . $search . "%")
                ->getQuery();
        $Adsitems = $qb->getResult();
        // rendering result
        return $this->render('AdBoxBundle:Admin:ads_loader.html.twig', array('ads' => $Adsitems));
    }


}
