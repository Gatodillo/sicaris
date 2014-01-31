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
 * Descripción de SalidaPorRecetaAdmin
 *
 * @author victor
 */
class SalidaPorRecetaAdmin extends Admin {
    // Campos que serán mostrado en los formularios para 
    // desplegar o editar información.
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('numero', 'text', array('label' => 'Número'))
            ->add("receta", "sonata_type_model_list")
            ->add("ubicacionOrigen", "sonata_type_model_list")
            ->add("ubicacionDestino", "sonata_type_model_list")    
            ->add("estado", null, array("label" => "Situación"))        
            ->add("movimientos", "sonata_type_collection", array(
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
        $datagridMapper
            ->add('numero')
        ;
    }
    
     // Campos que serán mostrados en las tablas (listas) de resultados
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('numero', null, array('label' => 'Número'))
            ->addidentifier("receta", null, array('label' => 'Receta'))
            ->addIdentifier("movimientos", null, array('label' => 'Movimientos'))
            ;    
    }
    
}
