<?php

namespace Saba\FarmaciaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MovimientoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaDeRegistro', 'date', array('widget' => 'single_text'))
            ->add('fechaDeEjecucion')
            ->add('almacenOrigen')
            ->add('almacenDestino')
            ->add('articulo')
            ->add('cantidad')
            ->add('precioUnitario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Saba\FarmaciaBundle\Entity\Movimiento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'saba_farmaciabundle_movimiento';
    }
}
