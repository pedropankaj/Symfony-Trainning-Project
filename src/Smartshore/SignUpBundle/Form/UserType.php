<?php

namespace Smartshore\SignUpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName','text',array('label' => 'First Name'))
            ->add('lastName','text',array('label' => 'Last Name'))
            ->add('email','email')
            ->add('password','password')
            ->add('UserName','text',array('label' => 'User Name'))
            ->add('status','choice', array('choices' => array('1' => '1', '0' => '0')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Smartshore\SignUpBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'smartshore_signupbundle_user';
    }
}
