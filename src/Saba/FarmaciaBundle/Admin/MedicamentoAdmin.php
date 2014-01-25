<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


/**
 * Description of MedicamentoAdmin
 *
 * @author victor
 */
class MedicamentoAdmin extends Admin {
    // Campos que serán mostrado en los formularios para 
    // desplegar o editar información.
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombreGenerico', 'text', array('label' => 'Nombre genérico'))
            ->add('descripcion',null,array('label'=>'Descripción'))
            ->add('unidadDeMedida',null,array('label'=>'Unidad de medida'))
            ->add("codigoDeBarras", 'text', array('label' => 'Código de barras'))
            ->add("grupo", null , array('label' => 'Grupo'))
            ->add("especialidad", null , array('label' => 'Especialidad'))
            ->add("subfamilia", 'sonata_type_model_list' , array('label' => 'Subfamilia'))                
            ->add("variantes", 'sonata_type_collection', array(
                    'by_reference' => false
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ))
        ;
    }
    
    // Campos que serán mostrados en los formularios con los filtros
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $variantes = $this
                ->modelManager
                ->createQuery('SabaFarmaciaBundle:VarianteDeMedicamento', 'vm')
                ->orderBy('vm.nombreComercial', 'ASC')
                ->getQuery()
                ->getResult();
        
        $opciones = array();
        foreach($variantes as $variante){
            $opciones[$variante->getId()] = $variante->getNombreComercial();
        }
        
        /*->add('variantes', null, array('label' => 'Nombre Comercial'), null, array(
                'expanded' => true,
                'multiple' => true,
                'query_builder' => function (\Doctrine\ORM\EntityRepository $repository) {
                    return $repository->createQueryBuilder('t')
                        ->add('orderBy', 't.nombreComercial ASC');
                    }
            ))*/
            
        $datagridMapper
            ->add('nombreGenerico', null, array('label' => 'Nombre genérico'))
            ->add('variantes', null, array('label' => 'Variantes'))    
            ->add("codigoDeBarras", null, array('label' => 'Código de barras'))
        ;
    }
    
     // Campos que serán mostrados en las tablas (listas) de resultados
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombreGenerico', null, array('label' => 'Nombre genérico'))
            ->addIdentifier("codigoDeBarras", null, array('label' => 'Código de barras'))

        ;
    }
}
