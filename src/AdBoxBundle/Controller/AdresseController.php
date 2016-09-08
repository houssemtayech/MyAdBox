<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Adresse;
use AdBoxBundle\Form\AdresseType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;
/**
 * Adresse controller.
 *
 * @Route("/adresse")
 */
class AdresseController extends Controller {

    /**
     * Lists all Adresse entities.
     *
     * @Route("/", name="adresse_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $adresses = $em->getRepository('AdBoxBundle:Adresse')->findAll();

        return $this->render('adresse/index.html.twig', array(
                    'adresses' => $adresses,
        ));
    }

    /**
     * Creates a new Adresse entity.
     *
     * @Route("/new", name="adresse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $adresse = new Adresse();
        $form = $this->createForm('AdBoxBundle\Form\AdresseType', $adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresse);
            $em->flush();

            return $this->redirectToRoute('adresse_show', array('id' => $adresse->getId()));
        }

        return $this->render('adresse/new.html.twig', array(
                    'adresse' => $adresse,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Adresse entity.
     *
     * @Route("/{id}", name="adresse_show")
     * @Method("GET")
     */
    public function showAction(Adresse $adresse) {
        $deleteForm = $this->createDeleteForm($adresse);

        return $this->render('adresse/show.html.twig', array(
                    'adresse' => $adresse,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Adresse entity.
     *
     * @Route("/{id}/edit", name="adresse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Adresse $adresse) {
        $deleteForm = $this->createDeleteForm($adresse);
        $editForm = $this->createForm('AdBoxBundle\Form\AdresseType', $adresse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($adresse);
            $em->flush();

            return $this->redirectToRoute('adresse_edit', array('id' => $adresse->getId()));
        }

        return $this->render('adresse/edit.html.twig', array(
                    'adresse' => $adresse,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Adresse entity.
     *
     * @Route("/{id}", name="adresse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Adresse $adresse) {
        $form = $this->createDeleteForm($adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adresse);
            $em->flush();
        }

        return $this->redirectToRoute('adresse_index');
    }

    /**
     * Creates a form to delete a Adresse entity.
     *
     * @param Adresse $adresse The Adresse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Adresse $adresse) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('adresse_delete', array('id' => $adresse->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }
    /**
     * get Available Countries
     *
     * @Route("/countries", name="getAvailableCountries")
     * @Method("POST")
     */
    public function getAvailableCountriesAction()
    {
      try{
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
        'SELECT DISTINCT a.pays
        FROM AdBoxBundle:Adresse a'
      );
        $countries = $query->getResult();
        $jsonContent = $serializer->serialize($countries, 'json');
        return new Response( $jsonContent,Response::HTTP_OK);

      }
      catch (Exception $e)
      {
        return new Response( Response::HTTP_404);
      }

    }

    /**
     * get Available city By country
     *
     * @Route("/cities", name="getAvailableCities")
     * @Method("POST")
     */
    public function getCityByCountryAction(Request $request)
    {
      $country=$request->get('country');
      try{
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                    'SELECT DISTINCT a.ville
                    FROM AdBoxBundle:Adresse a
                    WHERE a.pays=:country')
                    ->setParameter('country',$country);

        $cities = $query->getResult();
        $jsonContent = $serializer->serialize($cities, 'json');
        return new Response( $jsonContent,Response::HTTP_OK);
      }
      catch (Exception $e)
      {
        return new Response( Response::HTTP_404);
      }
    }

    /**
     * get Available region By city
     *
     * @Route("/regions", name="getAvailableRegions")
     * @Method("POST")
     */
    public function getRegionByCityAction(Request $request)
    {
      $city=$request->get('city');
      $country=$request->get('country');
      try{
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                    'SELECT DISTINCT a.region
                    FROM AdBoxBundle:Adresse a
                    WHERE a.ville=:city AND a.pays=:country')
                    ->setParameter('city',$city)
                    ->setParameter('country',$country);

        $cities = $query->getResult();
        $jsonContent = $serializer->serialize($cities, 'json');
        return new Response( $jsonContent,Response::HTTP_OK);
      }
      catch (Exception $e)
      {
        return new Response( Response::HTTP_404);
      }
    }

}
