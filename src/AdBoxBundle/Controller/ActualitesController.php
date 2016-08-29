<?php

namespace AdBoxBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdBoxBundle\Entity\Actualites;
use AdBoxBundle\Form\ActualitesType;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Actualites controller.
 *
 * @Route("/actualite")
 */
class ActualitesController extends Controller {

    /**
     * Lists all Actualites entities.
     *
     * @Route("/", name="actualite")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdBoxBundle:Actualites')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Actualites entity.
     *
     * @Route("/", name="actualite_create")
     * @Method("POST")
     * @Template("AdBoxBundle:Actualites:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Actualites();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

            $em = $this->getDoctrine()->getManager();
            $entity->upload();
            $date = new \DateTime();
            $entity->setDateredaction($date);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actualite_show', array('idactualite' => $entity->getIdactualite())));
        

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Actualites entity.
     *
     * @param Actualites $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Actualites $entity) {
        $form = $this->createForm(new ActualitesType(), $entity, array(
            'action' => $this->generateUrl('actualite_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Ajouter'));

        return $form;
    }

    /**
     * Displays a form to create a new Actualites entity.
     *
     * @Route("/new", name="actualite_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Actualites();
        $form = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Actualites entity.
     *
     * @Route("/{idactualite}", name="actualite_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($idactualite) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdBoxBundle:Actualites')->find($idactualite);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualites entity.');
        }
        $entity->upload();
        $deleteForm = $this->createDeleteForm($idactualite);

        return array(
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Actualites entity.
     *
     * @Route("/{idactualite}/edit", name="actualite_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($idactualite) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdBoxBundle:Actualites')->find($idactualite);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actualites entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($idactualite);

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Creates a form to edit a Actualites entity.
     *
     * @param Actualites $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Actualites $entity) {
        $form = $this->createForm(new ActualitesType(), $entity, array(
            'action' => $this->generateUrl('actualite_edit', array('idactualite' => $entity->getIdactualite())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array(
                            'label' => 'Modifier',
                            'attr' => array(
                            'class' => 'label label-warning'
                            )
                                )
                        );

        return $form;
    }

    /**
     * Edits an existing Actualites entity.
     *
     * @Route("/{idactualite}", name="actualite_update")
     * @Template("SquadFttBundle:Actualites:edit.html.twig")
     */
    public function updateAction(Request $request, $idactualite) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdBoxBundle:Actualites')->find($idactualite);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Club entity.');
        }

        $deleteForm = $this->createDeleteForm($idactualite);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

            $entity->upload();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('actualites_show', array('idactualite' => $idactualite)));
        

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Actualites entity.
     *
     * @Route("/{idactualite}", name="actualite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $idactualite) {
        $form = $this->createDeleteForm($idactualite);
        $form->handleRequest($request);

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdBoxBundle:Actualites')->find($idactualite);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actualites entity.');
            }

            $em->remove($entity);
            $em->flush();
        

        return $this->redirect($this->generateUrl('actualite'));
    }

    /**
     * Creates a form to delete a Actualites entity by id.
     *
     * @param mixed $idactualite The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($idactualite) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('actualite_delete', array('idactualite' => $idactualite)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array(
                            'label' => 'Supprimer',
                            'attr' => array(
                                'class' => 'label label-danger'
                            )
                                )
                        )
                        ->getForm()
        ;
    }

}
