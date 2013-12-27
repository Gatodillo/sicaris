<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of SalidaPorRecetaType
 *
 * @author victor
 */
class SalidaPorRecetaType  extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('numero',"number",array("label"=>"Número"))
                ->add('receta', new RecetaType())
                ->add('guardar', 'submit');
    }

    public function getName()
    {
        return "SalidaPorReceta";
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Saba\FarmaciaBundle\Entity\SalidaPorReceta',
            'cascade_validation' => true,
            ));
    }
}
