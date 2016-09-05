<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Shop;
use AdBoxBundle\Form\ShopType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Shop controller.
 *
 * @Route("/shop")
 */
class ShopController extends Controller {

    /**
     * Lists all Shop entities.
     *
     * @Route("/", name="shop_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $shops = $em->getRepository('AdBoxBundle:Shop')->findAll();

        return $this->render('shop/index.html.twig', array(
                    'shops' => $shops,
        ));
    }

    /**
     * Creates a new Shop entity.
     *
     * @Route("/new", name="shop_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $shop = new Shop();
        $form = $this->createForm('AdBoxBundle\Form\ShopType', $shop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($shop);
            $em->flush();

            return $this->redirectToRoute('shop_show', array('id' => $shop->getId()));
        }

        return $this->render('shop/new.html.twig', array(
                    'shop' => $shop,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Shop entity.
     *
     * @Route("/{id}", name="shop_show")
     * @Method("GET")
     */
    public function showAction(Shop $shop) {
        $deleteForm = $this->createDeleteForm($shop);

        return $this->render('shop/show.html.twig', array(
                    'shop' => $shop,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Shop entity.
     *
     * @Route("/{id}/edit", name="shop_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Shop $shop) {
        $deleteForm = $this->createDeleteForm($shop);
        $editForm = $this->createForm('AdBoxBundle\Form\ShopType', $shop);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($shop);
            $em->flush();

            return $this->redirectToRoute('shop_edit', array('id' => $shop->getId()));
        }

        return $this->render('shop/edit.html.twig', array(
                    'shop' => $shop,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Shop entity.
     *
     * @Route("/{id}", name="shop_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Shop $shop) {
        $form = $this->createDeleteForm($shop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($shop);
            $em->flush();
        }

        return $this->redirectToRoute('shop_index');
    }

    /**
     * Creates a form to delete a Shop entity.
     *
     * @param Shop $shop The Shop entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Shop $shop) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('shop_delete', array('id' => $shop->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    public function getShopByIdAction(Request $request) {
        $id = $request->get('id');
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $shop = $this->getDoctrine()
                ->getRepository('AdBoxBundle:Shop')
                ->find($id);
        $jsonContent = $serializer->serialize(array('name' => $shop->getName(), 'adress' => $shop->getIdAdress()), 'json');
        return new Response($jsonContent);
    }
    /**
     * get shops  By adresses
     *
     * @Route("/ByAdress", name="getAvailableShopsByAdresse")
     * @Method("POST")
     */
    public function getShopsByAdresse(Request $request)
    {
      $city=$request->get('city');
      $country=$request->get('country');
      $region=$request->get('region');
      try{
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('s.name,s.id ,s.logo,a as adress')
                ->from('AdBoxBundle:Shop', 's')
                ->innerJoin('AdBoxBundle:Adresse', 'a', 'WITH', 's.idAdress=a.id')
                ->where('a.pays = :country')
                ->andwhere('a.ville = :city')
                ->andwhere('a.region = :region')
                ->setParameter('country',$country)
                ->setParameter('city',$city)
                ->setParameter('region',$region)
                ->getQuery();
        $shops = $qb->getResult();
        $jsonContent = $serializer->serialize($shops, 'json');
        return new Response( $jsonContent,Response::HTTP_OK);
      }
      catch (Exception $e)
      {
        return new Response( Response::HTTP_404);
      }
    }
    /**
     * get shops  By mutltiple ids
     * @Route("/ByAdressByID", name="getAvailableShopsByIds")
     * @Method("POST")
     */
     //Edit : Get only a single shop
    public function getShopsByIdsAction(Request $request)
    {
      $shop=$request->get('shop');
      try{
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
                ->select('s.name,s.logo,s.id')
                ->from('AdBoxBundle:Shop', 's')
                ->where('s.id = :id')
                ->setParameter('id',$shop)
                ->getQuery();
        $shops_res = $qb->getResult();
        $jsonContent = $serializer->serialize($shops_res, 'json');
        return new Response( $jsonContent,Response::HTTP_OK);
      }
      catch (Exception $e)
      {
        return new Response( Response::HTTP_404);
      }
    }

    /**
     * get shops adress
     * @Route("/adresse", name="getShopAdress")
     * @Method("POST")
     */

    public function getShopAdresseAction(Request $request)
    {
      $id=$request->get('id');
      try{
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $shop = $this->getDoctrine()
                ->getRepository('AdBoxBundle:Shop')
                ->find($id);
        $jsonContent = $serializer->serialize(array("id"=>$shop->getId(),"name"=>$shop->getName(),"adress"=>$shop->getIdAdress(),"logo"=>$shop->getLogo()), 'json');
        return new Response( $jsonContent,Response::HTTP_OK);
      }
      catch (Exception $e)
      {
        return new Response( Response::HTTP_404);
      }
    }

}
