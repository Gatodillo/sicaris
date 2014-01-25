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
 * TODO: Crear el servicio.
 * Description of OrdenDeCompraAdmin
 *
 * @author victor
 */
class OrdenDeCompraAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de una orden de compra.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form
            ->add("numero",null,array('label' => 'Número'))
            ->add("fechaDeElaboracion",null,array('label' => 'Fecha de elaboración'))
            ->add("proveedor",null,array('label' => 'Proveedor'))
            ->add("facturas",'sonata_type_collection',
                    array('by_reference' => 'false'),
                    array('edit' => 'standard', 
                        'inline' => 'table',
                        'sortable' => 'position'
                    )
                )
            ;
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("numero",null,
                    array('label' => 'Número',
                        'route' => array('name' => 'show')))
            ->addIdentifier("proveedor",null,
                    array('label' => 'Proveedor',
                        'route' => array('name' => 'show')))
            ->addIdentifier("facturas",null,
                    array('label' => 'Facturas',
                        'route' => array('name' => 'show')))
            ;
    }
    
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add("numero",null,array('label' => 'Número'))
            ->add("proveedor",null,array('label' => 'Proveedor'))
            ->add("facturas",null,array('label' => 'Facturas')) 
            ;
    }
    
    public function configureShowFields(\Sonata\AdminBundle\Show\ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add("numero",null,array('label' => 'Número'))
            ->add("proveedor",null,array('label' => 'Proveedor'))
            ->add("facturas",null,array('label' => 'Facturas')) 
            ;                
    }
}
