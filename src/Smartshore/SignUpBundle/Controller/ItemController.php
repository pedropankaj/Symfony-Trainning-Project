<?php

namespace Smartshore\SignUpBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Smartshore\SignUpBundle\Entity\Item;
use Smartshore\SignUpBundle\Form\ItemType;

/**
 * Item controller.
 *
 */
class ItemController extends Controller
{

    /**
     * Lists all Item entities.
     *
     */
    public function indexAction($id)
    {
        //print_r($id);
        
        $em = $this->getDoctrine()->getManager();
        if($id==''){

        $entities = $em->getRepository('SmartshoreSignUpBundle:Item')->findAll();
        //$entities = $em->getRepository('SmartshoreSignUpBundle:Item')->findBy(array('list_id'=>$list_id));
        } else{
            //print_r($id); die();
            /*$entities = $em->getRepository('SmartshoreSignUpBundle:Item')->findByLists(array('list_id' => $id,));*/
            //$position = $em->getRepository('SmartshoreSignUpBundle:Item')->findBy(array('ListOrder' => 'top'));
            //print_r($position);
            $topentities = $em->getRepository('SmartshoreSignUpBundle:Item')->findItemOrders($id,'top');
            $bottomentities = $em->getRepository('SmartshoreSignUpBundle:Item')->findItemOrders($id,'bottom');
            return $this->render('SmartshoreSignUpBundle:Item:index.html.twig', array(
                'entities' => $topentities,
                'entities1' => $bottomentities,
                'list_id' => $id
            ));
        }

        return $this->render('SmartshoreSignUpBundle:Item:index.html.twig', array(
            'entities' => $entities,
            'list_id' => $id
        ));
    }
    
   
    /**
     * Creates a new Item entity.
     *
     */
    public function createAction(Request $request)
    {
        //print_r($_REQUEST); die();
        $em = $this->getDoctrine()->getManager();
        $items=$request->get('smartshore_signupbundle_item');
        $itemName=$items['itemName'];
        $itemStatus=$items['itemStatus'];
        $ListId = $items['list_id'];
        $ListOrder = $items['listOrder'];

        $entity = new Item();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $lst = $em->getRepository('SmartshoreSignUpBundle:Lists')->find($ListId);
        if ($form->isValid()) {
            $entity->setLists($lst);

            $em->persist($entity);
            $em->flush();
            // $item
            return $this->redirect($this->generateUrl('lists'));//$this->redirect($this->generateUrl('item_show', array('id' => $entity->getId())));
        }
    }

    /**
     * Creates a form to create a Item entity.
     *
     * @param Item $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Item $entity, $list_id=null)
    {
        $form = $this->createForm(new ItemType(), $entity, array(
            'action' => $this->generateUrl('item_create'),
            'method' => 'POST',
        ));
        $form->add('list_id', 'hidden', array('data' => $list_id,'mapped'=>false));
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Item entity.
     *
     */
    public function newAction($list_id)
    {
        
        $entity = new Item();
        $form   = $this->createCreateForm($entity,$list_id);
        if($list_id==''){
        return $this->render('SmartshoreSignUpBundle:Item:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
        }else{
           
           return $this->render('SmartshoreSignUpBundle:Item:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),

        )); 
        }
    }

    /**
     * Finds and displays a Item entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartshoreSignUpBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartshoreSignUpBundle:Item:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Item entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartshoreSignUpBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SmartshoreSignUpBundle:Item:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Item entity.
    *
    * @param Item $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Item $entity)
    {
        $form = $this->createForm(new ItemType(), $entity, array(
            'action' => $this->generateUrl('item_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Item entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SmartshoreSignUpBundle:Item')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Item entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('item_edit', array('id' => $id)));
        }

        return $this->render('SmartshoreSignUpBundle:Item:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Item entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SmartshoreSignUpBundle:Item')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Item entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('item'));
    }
    
    function deleteItemAction(Request $request, $id){
         $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SmartshoreSignUpBundle:Item')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Item entity.');
            }

            $em->remove($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('lists'));
    }
    
    

    /**
     * Creates a form to delete a Item entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('item_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /*private function listallAction($list_id){
        $em = $this->getDoctrine()->getManager();
        //print_r($list_id); die();
        $id1 = $em->getRepository('SmartshoreSignUpBundle:Item')->findBy(array('list_id' => $list_id));
        $id1->getLists();
        
        //$query=$em->createQuery("SELECT u.ItemName FROM TrademarkCustomerBundle: as u where u.id in ($id1)");  
        return $this->render('SmartshoreSignUpBundle:Item:index.html.twig', array(
            'id' => $id1,
        ));
    }*/
    
}
