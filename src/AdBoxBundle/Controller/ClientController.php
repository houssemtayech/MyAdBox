<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Client;
use AdBoxBundle\Form\ClientType;
use AdBoxBundle\Form\EditClientForm;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Client controller.
 *
 * @Route("/client")
 */
class ClientController extends Controller {

    /**
     * Lists all Client entities.
     *
     * @Route("/", name="client_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('AdBoxBundle:Client')->findAll();

        return $this->render('client/index.html.twig', array(
                    'clients' => $clients,
        ));
    }

    /**
     * Creates a new Client entity.
     *
     * @Route("/new", name="client_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $client = new Client();
        $form = $this->createForm('AdBoxBundle\Form\ClientType', $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_show', array('id' => $client->getId()));
        }

        return $this->render('client/new.html.twig', array(
                    'client' => $client,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Client entity.
     *
     * @Route("/", name="client_show")
     * @Method("GET")
     */
    public function showAction(Client $client) {
        $deleteForm = $this->createDeleteForm($client);

        return $this->render('client/show.html.twig', array(
                    'client' => $client,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Client entity.
     *
     * @Route("/{id}/edit", name="client_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Client $client) {
        $deleteForm = $this->createDeleteForm($client);
        $editForm = $this->createForm('AdBoxBundle\Form\ClientType', $client);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_edit', array('id' => $client->getId()));
        }

        return $this->render('client/edit.html.twig', array(
                    'client' => $client,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Client entity.
     *
     * @Route("/{id}", name="client_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Client $client) {
        $form = $this->createDeleteForm($client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($client);
            $em->flush();
        }

        return $this->redirectToRoute('client_index');
    }

    /**
     * Creates a form to delete a Client entity.
     *
     * @param Client $client The Client entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Client $client) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('client_delete', array('id' => $client->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    public function listAllClientAction() {
        $em = $this->getDoctrine()->getManager();
        $roles = "ROLE_CLIENT";
        $query = $em->createQuery('select A from AdBoxBundle:User A where A.roles like :roles ')
                ->setParameter('roles', '%' . $roles . '%');
        // $users = $em->getRepository('AdBoxBundle:Admin')->findAll();
        $users = $query->getResult();

        return $this->render('AdBoxBundle:cLIENT:allClients.html.twig', array(
                    'users' => $users,
        ));
    }

    public function editClientAction($id) {
        $em = $this->container->get('doctrine')->getEntityManager();
        $Client = $em->getRepository('AdBoxBundle:Client')->find($id);
        $form = $this->createform(new EditClientForm(), $Client);
        //assigner les données saisies par l'user à l'objet modele
        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {

            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->container->get('Doctrine')->getEntityManager();
                $em->persist($Client);
                $em->flush();
                return $this->render('AdBoxBundle:Client:succes.html.twig', array('msg' => 'Mise à jour affectuée avec succès'));
            }
        } return $this->render('AdBoxBundle:Client:editClient.html.twig', array('Form' => $form->createView()));
    }

    public function showAdsAction() {
        // get Current client id
        $session = new Session();
        $session->set('id', 1);
        $user_id = $session->get('id');
        // initialize tools
        $em = $this->getDoctrine()->getManager();
        // Ads query
        $qb = $em->createQueryBuilder()
                ->select('p,e.name')
                ->from('AdBoxBundle:Pub', 'p')
                ->innerJoin('AdBoxBundle:Timelaps', 't', 'WITH', 't.id = p.idTimelaps')
                ->innerJoin('AdBoxBundle:EventTimelaps', 'et', 'WITH', 'et.idTimelaps = p.idTimelaps')
                ->innerJoin('AdBoxBundle:Event', 'e', 'WITH', 'e.id = et.idEvent')
                ->where('p.idUSer = :id')
                ->setParameter('id', $user_id)
                ->getQuery();
        $Adsitems = $qb->getResult();
        // rendering result

        return $this->render('AdBoxBundle:Client:ads.html.twig', array('ads' => $Adsitems));
    }

    public function ShowAdsFilterAction(Request $request) {

        $session = new Session();
        $session->set('id', 1);
        $user_id = $session->get('id');

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
                ->orderBy($filter)
                ->setParameter('id', $user_id)
                ->setParameter('txt', "%" . $search . "%")
                ->getQuery();
        $Adsitems = $qb->getResult();
        // rendering result
        return $this->render('AdBoxBundle:Client:adsBlock.html.twig', array('ads' => $Adsitems));
    }

}
