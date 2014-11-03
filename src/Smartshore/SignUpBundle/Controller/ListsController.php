<?php

namespace Smartshore\SignUpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Smartshore\SignUpBundle\Entity\Lists;
use Smartshore\SignUpBundle\Form\ListsType;


/**
 * Lists controller.
 *
 */
class ListsController extends Controller
{


    /**
     * Lists all Lists entities.
     *
     */
    public function indexAction(Request $request)
    {
        $sess = $this->get('security.context')->getToken()->getUser();

        //print_r($sess);
        /*if(!$sess->get('Email'))
        {
            return $this->redirect($this->generateUrl('user'));
            exit();
        }*/
        $ussr = $this->get('security.context')->getToken()->getUser();
        //print_r($request->getSession());
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SmartshoreSignUpBundle:Lists')->findAll();
        //$entities1 = $em->getRepository('SmartshoreSignUpBundle:Item')->findOneById($id);
        
        return $this->render('SmartshoreSignUpBundle:Lists:index.html.twig', array(
            'entities' => $entities,
            'login_user' => $ussr,
            //'entities1' => $entities1,
            
        ));
    }
    /**
     * Creates a new Lists entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Lists();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $ajxact = false;
            if($request->isXmlHttpRequest()){
                return new Response($this->generateUrl('lists_show', array('id' => $entity->getId())));
            }else{
                return $this->redirect($this->generateUrl('lists_show', array('id' => $entity->getId())));
            }

        }

        return $this->render('SmartshoreSignUpBundle:Lists:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));

    }

    /**
     * Creates a form to create a Lists entity.
     *
     * @param Lists $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Lists $entity)
    {
        $form = $this->createForm(new ListsType(), $entity, array(
            'action' => $this->generateUrl('lists_create'),
            'method' => 'POST',
        ));

        $form->add('button', 'button', array('label' => 'Create',
            'attr' => array('class' => 'savebtn')));

        return $form;
    }

    /**
     * Displays a form to create a new Lists entity.
     *
     */
    public function newAction()
    {
        $entity = new Lists();
        $form   = $this->createCreateForm($entity);

        return $this->render('SmartshoreSignUpBundle:Lists:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Lists entity.
     *
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartshoreSignUpBundle:Lists')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lists entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartshoreSignUpBundle:Lists:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Lists entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartshoreSignUpBundle:Lists')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lists entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartshoreSignUpBundle:Lists:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Lists entity.
    *
    * @param Lists $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Lists $entity)
    {
        $form = $this->createForm(new ListsType(), $entity, array(
            'action' => $this->generateUrl('lists_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Lists entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartshoreSignUpBundle:Lists')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Lists entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lists_edit', array('id' => $id)));
        }

        return $this->render('SmartshoreSignUpBundle:Lists:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Lists entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        //$form = $this->createDeleteForm($id);
        //$form->handleRequest($request);
        print_r($_REQUEST);
        //if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SmartshoreSignUpBundle:Lists')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lists entity.');
            }
            $em->remove($entity);
            $em->flush();
        //}

        return $this->redirect($this->generateUrl('lists'));
    }

    public function deleteListAction(Request $request, $id)
    {

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SmartshoreSignUpBundle:Lists')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Lists entity.');
            }
            $em->remove($entity);
            $em->flush();


        return $this->redirect($this->generateUrl('lists'));
    }


    /**
     * Creates a form to delete a Lists entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lists_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
