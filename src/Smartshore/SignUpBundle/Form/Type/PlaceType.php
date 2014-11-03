<?php

namespace My\MainBundle\Form\Type;
 
use Symfony\Component\Form\FormBuilderInterface;
 
class PlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('address', 'gmap_address', array(
            'data_class' => 'My\MainBundle\Entity\Place',
        ));
    }
}