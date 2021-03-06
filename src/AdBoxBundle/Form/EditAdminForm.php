<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdBoxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Description of EditAdminForm
 *
 * @author Houssem
 */
class EditAdminForm extends AbstractType {
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('groupe')
            ->add('cin')
            ->add('firstName')
            ->add('lastName')
            ->add('eMail')
            ->add('locked')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdBoxBundle\Entity\Admin'
        ));
    }
    public function getName() 
    {
        return 'Modele';
    }
}
