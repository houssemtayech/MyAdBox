<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdBoxBundle\Entity\Pub;
use AdBoxBundle\Form\PubType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Symfony\Component\Security\Acl\Exception\Exception;
/**
 * Pub controller.
 *
 * @Route("/pub")
 */
class PubController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pubs = $em->getRepository('AdBoxBundle:Pub')->findAll();

        return $this->render('pub/index.html.twig', array(
            'pubs' => $pubs,
        ));
    }

    /**
     * Creates a new Pub entity.
     *
     * @Route("/new", name="pub_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pub = new Pub();
        $form = $this->createForm('AdBoxBundle\Form\PubType', $pub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pub);
            $em->flush();

            return $this->redirectToRoute('pub_show', array('id' => $pub->getId()));
        }

        return $this->render('pub/new.html.twig', array(
            'pub' => $pub,
            'form' => $form->createView(),
        ));
    }

/*
    public function showAction(Pub $pub)
    {

        $deleteForm = $this->createDeleteForm($pub);
var_dump($pub);
        return $this->render('pub/show.html.twig', array(
            'pub' => $pub,
            'delete_form' => $deleteForm->createView(),
        ));
    }
*/

    public function editshowAction($id)
    {
      $em = $this->getDoctrine()->getManager();
      $ad=$em->getRepository('AdBoxBundle:Pub')->find($id);
      $medias = $em->getRepository('AdBoxBundle:Media')->findBy(array("idUser"=>$ad->getIdUSer()));
      $qb = $em->createQueryBuilder()
              ->select('e.name')
              ->from('AdBoxBundle:Event', 'e')
              ->innerJoin('AdBoxBundle:EventTimelaps', 'et', 'WITH', 'et.idEvent = e.id')
              ->innerJoin('AdBoxBundle:Timelaps', 't', 'WITH', 't.id = et.idTimelaps')
              ->where('t.id = :id')
              ->setParameter('id',$ad->getIdTimelaps())
              ->getQuery();
      $event = $qb->getResult();
      return $this->render('AdBoxBundle:Ad:edit.html.twig',
                              array('ad'=>$ad,'medias'=>$medias,'event'=>$event[0]));
    }

    public function editAction(Request $request)
    {
      $ad_id=$request->get('ad');
      $media_id=$request->get('media');

      //Todo check media owner
      try{
        $em = $this->getDoctrine()->getManager();
        $ad = $this->getDoctrine()
              ->getRepository('AdBoxBundle:Pub')
              ->find($ad_id);

        $media = $this->getDoctrine()
                  ->getRepository('AdBoxBundle:Media')
                  ->find($media_id);
        echo "Media user ID : ".$media->getIdUSer()->getId()."ad user id : ".$ad->getIdUSer()->getId();
        if ($media->getIdUSer()->getId()==$ad->getIdUSer()->getId())
        {
         $ad->setIdMedia($media);
         // tells Doctrine you want to (eventually) save the Product (no queries yet)
         $em->persist($ad);
         // actually executes the queries (i.e. the INSERT query)
         $em->flush();
         return new Response( Response::HTTP_OK);
         }
         else {
           throw new Exception('Not an owner');
         }

      }
        catch(Exception $e){
    return new Response( $e->getMessage(),Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Deletes a Pub entity.
     *
     * @Route("/{id}", name="pub_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pub $pub)
    {
        $form = $this->createDeleteForm($pub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pub);
            $em->flush();
        }

        return $this->redirectToRoute('pub_index');
    }

    /**
     * Creates a form to delete a Pub entity.
     *
     * @param Pub $pub The Pub entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pub $pub)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pub_delete', array('id' => $pub->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function getAdByIdAction(Request $request)
    {
      $id=$request->get('id');
      $encoders = array(new XmlEncoder(), new JsonEncoder());
      $normalizers = array(new ObjectNormalizer());

      $serializer = new Serializer($normalizers, $encoders);
      $ad = $this->getDoctrine()
       ->getRepository('AdBoxBundle:Pub')
       ->find($id);
      $jsonContent = $serializer->serialize($ad->getIdMedia(), 'json');
      return new Response( $jsonContent);

    }

    public function setEnableStatusAction(Request $request)
    {
      $id=$request->get('id');
      $isEnable=$request->get('isEnable');
      try{
        $em = $this->getDoctrine()->getManager();
        $ad = $this->getDoctrine()
         ->getRepository('AdBoxBundle:Pub')
         ->find($id);
         $ad->setIsEnabled($isEnable);
         // tells Doctrine you want to (eventually) save the Product (no queries yet)
         $em->persist($ad);
         // actually executes the queries (i.e. the INSERT query)
         $em->flush();
         return new Response( Response::HTTP_OK);
      }
        catch(Exception $e){
            return new Response( Response::HTTP_NOT_FOUND);
        }
    }

    public function calendarshowAction()
    {
      $em = $this->getDoctrine()->getManager();
      $id_user=1;
      //Todo check media owner

      $medias = $this->getDoctrine()
                ->getRepository('AdBoxBundle:Media')
                ->findBy(array('idUser'=>$id_user));
      $events = $em->getRepository('AdBoxBundle:Event')->findBy(array('status'=>true));
      return $this->render('AdBoxBundle:Client:calendar.html.twig', array(
                         'events' => $events,'medias'=>$medias
             ));
    }
    /**
     * Add Ad
     *
     * @Route("/add", name="addAd")
     * @Method("POST")
     */
    public function addAddAction(Request $request)
    {
      try{
      $em = $this->getDoctrine()->getManager();
      $media_id=$request->get("idMedia");
      $timelaps_id=$request->get("idTimelaps");
      $user_id=1;
      $timelaps_array=json_decode($timelaps_id);
      foreach($timelaps_array as $id_t) {
        $pub = new Pub();
        $timelaps = $this->getDoctrine()
                  ->getRepository('AdBoxBundle:Timelaps')
                  ->find($id_t);
        $media = $this->getDoctrine()
                    ->getRepository('AdBoxBundle:Media')
                    ->find($media_id);
        $user = $this->getDoctrine()
                ->getRepository('AdBoxBundle:User')
                ->find($user_id);
        $pub->setidUSer( $user);
        $pub->setIdMedia( $media);
        $pub->setIdTimelaps( $timelaps);
        $pub->setIsEnabled(false);
        $em->persist($pub);
        $em->flush();
      }
      return new Response( Response::HTTP_OK);
}
catch(Exception $e)
{
  return new Response( Response::HTTP_NOT_FOUND);

}
    }
}
