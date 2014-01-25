<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


/**
 * Description of FacturaDeProveedorAdmin
 *
 * @author victor
 */
class FacturaDeProveedorAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de una orden de compra.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form
            ->add("folio",null,array('label' => 'Folio'))
            ->add("proveedor",null,array('label' => 'Proveedor'))
            ->add("fechaDeRecepcion",null,array('label' => 'Fecha de recepción')) 
            ->add('lineas','sonata_type_collection', 
                    array("label"=>"Líneas", 'by_reference' => 'false'
                        ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ))
            ->add("subtotal",null,array('label' => 'Subtotal'))
            ->add("total",null,array('label' => 'Total'))
            ;
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("folio",null,
                    array('label' => 'Folio',
                        'route' => array('name' => 'show')))
            ->addIdentifier("proveedor",null,
                    array('label' => 'Proveedor',
                        'route' => array('name' => 'show')))
            ->addIdentifier("fechaDeRecepcion",null,
                    array('label' => 'Fecha de recepción',
                        'route' => array('name' => 'show')))
            ->addIdentifier("lineas",null,
                    array('label' => 'Artículos',
                        'route' => array('name' => 'show')))
            ->addIdentifier("total",null,
                    array('label' => 'Total',
                        'route' => array('name' => 'show')))
            ;
    }
    
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add("folio",null,array('label' => 'Folio'))
            ->add("proveedor",null,array('label' => 'Proveedor'))
            ;
    }
    
    public function configureShowFields(\Sonata\AdminBundle\Show\ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add("folio",null,array('label' => 'Folio'))
            ->add("proveedor",null,array('label' => 'Proveedor'))
            ->add("fechaDeRecepcion",null,array('label' => 'Fecha de recepción')) 
            ->add('lineas',null, array("label"=>"Artículos"))
            ->add("subtotal",null,array('label' => 'Subtotal'))
            ->add("total",null,array('label' => 'Total'))
            ;                
    }
}
