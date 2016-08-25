<?php

namespace AdBoxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url')
            ->add('type')
            ->add('file')
            ->add('createdAt', 'genemu_jquerydate', array(
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd',
            ))
            ->add('duree')
            ->add('resolution')
            ->add('id')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdBoxBundle\Entity\Media'
        ));
    }
  
}
