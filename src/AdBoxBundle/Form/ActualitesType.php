<?php

namespace AdBoxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


class ActualitesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('titre')
            ->add('corps')
            ->add('etat','choice',array('label'=>'Souhaitez vous publier cette actualite?','choices'=>array(
                    'Publier'=>'Publier',
                    'Ne Pas publier'=>'Ne Pas publier',   
                )))
            
           ->add('file','file',array('required'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdBoxBundle\Entity\Actualites'
        ));
    }

    /**
     * @return string
     */
//    public function getName()
//    {
//        return 'squad_fttbundle_actualites';
//    }
}

