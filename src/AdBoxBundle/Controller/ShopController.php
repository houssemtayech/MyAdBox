<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Shop;
use AdBoxBundle\Entity\Adresse;
use AdBoxBundle\Form\ShopType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Zend\Stdlib\DateTime;
/**
 * Shop controller.
 *
 * @Route("/shop")
 */
class ShopController extends Controller
{

    /**
     * Lists all Shop entities.
     *
     * @Route("/", name="shop_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $shops = $em->getRepository('AdBoxBundle:Shop')->findAll();
        return $this->render('shop/index.html.twig', array(
            'shops' => $shops
        ));
    }

    /**
     * Creates a new Shop entity.
     *
     * @Route("/new", name="shop_new")
     * @Method("GET")
     */
    public function newAction()
    {
        return $this->render('AdBoxBundle:Shop:add.html.twig');
    }
    /**
     * Creates a new Shop entity and submit.
     *
     * @Route("/newFlush", name="shop_new_flush")
     * @Method("POST")
     */
    public function newFlushAction(Request $request)
    {
        try {
            $em = $this->getDoctrine()->getManager();
            $shop    = new Shop();
            $adresse = new Adresse();
            $adresse->setPays($request->get('Country'));
            $adresse->setVille($request->get('City'));
            $adresse->setRegion($request->get('Region'));
            $adresse->setRue($request->get('Street'));
            $adresse->setCodepostal($request->get('PostalCode'));
            $adresse->setLongitude($request->get('Longitude'));
            $adresse->setLatitude($request->get('Latitude'));

            $shop->setName($request->get('Name'));
            //just for test set user id 1
            $user      = $this->getDoctrine()->getRepository('AdBoxBundle:User')->find(1);
            $date      = new DateTime();
            $timestamp = $date->format('U');
            foreach ($request->files as $uploadedFile) {
                $path = $this->get('kernel')->getRootDir() . "/../web/uploads/" . $timestamp . basename($uploadedFile->getClientOriginalName());
                if (move_uploaded_file($uploadedFile, $path)) {
                  $em->persist($adresse);
                  $em->flush();
                  $shop->setIdAdress($adresse);
                  $shop->setOwnerId($user);
                    $shop->setLogo($path);
                    $em->persist($shop);
                    $em->flush();
                    return new Response(Response::HTTP_OK);
                } else {
                    return new Response(Response::HTTP_404);
                }
            }

        }
        catch (Exception $e) {
            return new Response(Response::HTTP_404);

        }
    }
    /**
     * Finds and displays a Shop entity.
     *
     * @Route("/show/{id}", name="shop_show")
     * @Method("GET")
     */
    public function showAction(Shop $shop)
    {
        $deleteForm = $this->createDeleteForm($shop);

        return $this->render('shop/show.html.twig', array(
            'shop' => $shop,
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Shop entity.
     *
     * @Route("/edit/{id}", name="shop_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request,  $id)
    {
      $iduser=1;
      $encoders    = array(
          new XmlEncoder(),
          new JsonEncoder()
      );
      $normalizers = array(
          new ObjectNormalizer()
      );
      $serializer  = new Serializer($normalizers, $encoders);
      if ($request->isMethod("GET"))
      {
        $shop= $this->getDoctrine()->getRepository('AdBoxBundle:Shop')->findBy(array("ownerId"=>$iduser,"id"=>$id,"isDeleted"=>false));
        return $this->render('AdBoxBundle:Shop:edit.html.twig',array("shop"=>$shop[0]));

      }
      if ($request->isMethod("POST")){
        try {
          $em = $this->getDoctrine()->getManager();
          $idshop=$request->get('id');
          $shop      = $this->getDoctrine()->getRepository('AdBoxBundle:Shop')->find($idshop);
          $adresse = $shop->getIdAdress();
            $adresse->setPays($request->get('Country'));
            $adresse->setVille($request->get('City'));
            $adresse->setRegion($request->get('Region'));
            $adresse->setRue($request->get('Street'));
            $adresse->setCodepostal($request->get('PostalCode'));
            $adresse->setLongitude($request->get('Longitude'));
            $adresse->setLatitude($request->get('Latitude'));
            $shop->setName($request->get('Name'));
            //just for test set user id 1
            $user      = $this->getDoctrine()->getRepository('AdBoxBundle:User')->find(1);
            $date      = new DateTime();
            $timestamp = $date->format('U');
            $em->persist($adresse);
            $em->flush();
            $shop->setIdAdress($adresse);
            $shop->setOwnerId($user);
            foreach ($request->files as $uploadedFile) {
                $path = $this->get('kernel')->getRootDir() . "/../web/uploads/" . $timestamp . basename($uploadedFile->getClientOriginalName());
                if (move_uploaded_file($uploadedFile, $path)) {
                    str_replace("C:\wamp64\www\\", "http://localhost/", $path);
                    $shop->setLogo($path);

                    return new Response(Response::HTTP_OK);
                } else {
                    return new Response(Response::HTTP_404);
                }
            }
            $em->persist($shop);
            $em->flush();
            return new Response(Response::HTTP_OK);
        }
        catch (Exception $e) {
            return new Response(Response::HTTP_404);

        }
      }

    }

    /**
     * Deletes a Shop entity.
     *
     * @Route("/delete/{id}", name="shop_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request)
    {
      try{
      $em = $this->getDoctrine()->getManager();
      $idshop=$request->get('id');
      $shop      = $this->getDoctrine()->getRepository('AdBoxBundle:Shop')->find($idshop);
      $shop->setIsDeleted(1);
      $em->persist($shop);
      $em->flush();
          return new Response(Response::HTTP_OK);
    }
    catch(Exception $e)
    {
                  return new Response(Response::HTTP_404);
    }
}
    /**
     * Creates a form to delete a Shop entity.
     *
     * @param Shop $shop The Shop entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Shop $shop)
    {
        return $this->createFormBuilder()->setAction($this->generateUrl('shop_delete', array(
            'id' => $shop->getId()
        )))->setMethod('DELETE')->getForm();
    }

    public function getShopByIdAction(Request $request)
    {
        $id          = $request->get('id');
        $encoders    = array(
            new XmlEncoder(),
            new JsonEncoder()
        );
        $normalizers = array(
            new ObjectNormalizer()
        );

        $serializer  = new Serializer($normalizers, $encoders);
        $shop        = $this->getDoctrine()->getRepository('AdBoxBundle:Shop')->find($id);
        $jsonContent = $serializer->serialize(array(
            'name' => $shop->getName(),
            'adress' => $shop->getIdAdress()
        ), 'json');
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
        $city    = $request->get('city');
        $country = $request->get('country');
        $region  = $request->get('region');
        try {
            $encoders    = array(
                new XmlEncoder(),
                new JsonEncoder()
            );
            $normalizers = array(
                new ObjectNormalizer()
            );
            $serializer  = new Serializer($normalizers, $encoders);

            $em          = $this->getDoctrine()->getManager();
            $qb          = $em->createQueryBuilder()->select('s.name,s.id ,s.logo,a as adress')->from('AdBoxBundle:Shop', 's')->innerJoin('AdBoxBundle:Adresse', 'a', 'WITH', 's.idAdress=a.id')->where('a.pays = :country')->andwhere('a.ville = :city')->andwhere('a.region = :region')->setParameter('country', $country)->setParameter('city', $city)->setParameter('region', $region)->getQuery();
            $shops       = $qb->getResult();
            $jsonContent = $serializer->serialize($shops, 'json');
            return new Response($jsonContent, Response::HTTP_OK);
        }
        catch (Exception $e) {
            return new Response(Response::HTTP_404);
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
        $shop = $request->get('shop');
        try {
            $encoders    = array(
                new XmlEncoder(),
                new JsonEncoder()
            );
            $normalizers = array(
                new ObjectNormalizer()
            );
            $serializer  = new Serializer($normalizers, $encoders);

            $em          = $this->getDoctrine()->getManager();
            $qb          = $em->createQueryBuilder()->select('s.name,s.logo,s.id')->from('AdBoxBundle:Shop', 's')->where('s.id = :id')->setParameter('id', $shop)->getQuery();
            $shops_res   = $qb->getResult();
            $jsonContent = $serializer->serialize($shops_res, 'json');
            return new Response($jsonContent, Response::HTTP_OK);
        }
        catch (Exception $e) {
            return new Response(Response::HTTP_404);
        }
    }

    /**
     * get shops adress
     * @Route("/adresse", name="getShopAdress")
     * @Method("POST")
     */

    public function getShopAdresseAction(Request $request)
    {
        $id = $request->get('id');
        try {
            $encoders    = array(
                new XmlEncoder(),
                new JsonEncoder()
            );
            $normalizers = array(
                new ObjectNormalizer()
            );
            $serializer  = new Serializer($normalizers, $encoders);

            $shop        = $this->getDoctrine()->getRepository('AdBoxBundle:Shop')->find($id);
            $jsonContent = $serializer->serialize(array(
                "id" => $shop->getId(),
                "name" => $shop->getName(),
                "adress" => $shop->getIdAdress(),
                "logo" => $shop->getLogo()
            ), 'json');
            return new Response($jsonContent, Response::HTTP_OK);
        }
        catch (Exception $e) {
            return new Response(Response::HTTP_404);
        }
    }

}
