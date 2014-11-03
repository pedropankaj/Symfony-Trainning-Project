<?php

namespace Smartshore\SignUpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ItemType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('itemName')
            ->add('itemStatus','choice', array(
                'choices' => array('1' => 'Active', '0' => 'Inactive')
            ))
            ->add('listOrder', 'choice', array(
                'choices' => array('top' => 'Place on Top of List','bottom' => 'Place on Bottom of List'),
                'multiple' => false,
                'expanded' => true,
                'attr' => array('class' => 'testClass'),
            ))
            ->add('ItemColor', 'text');

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Smartshore\SignUpBundle\Entity\Item'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartshore_signupbundle_item';
    }
}
