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
 * Description of LineaDeFacturaDeProveedorAdmin
 *
 * @author victor
 */
class LineaDeFacturaDeProveedorAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de una orden de compra.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form
            ->add("articulo",null,array('label' => 'Artículo'))
            ->add("cantidad",null,array('label' => 'Cantidad'))
            ->add("precioUnitario",null,array('label' => 'Precio unitario')) 
            ;
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("factura",null,
                    array('label' => 'Factura',
                        'route' => array('name' => 'show')))
            ->addIdentifier("articulo",null,
                    array('label' => 'Artículo',
                        'route' => array('name' => 'show')))
            ->addIdentifier("cantidad",null,
                    array('label' => 'Cantidad',
                        'route' => array('name' => 'show')))
            ->addIdentifier("precioUnitario",null,
                    array('label' => 'Precio unitario',
                        'route' => array('name' => 'show')))
            ->addIdentifier("subtotal",null,
                    array('label' => 'Subtotal',
                        'route' => array('name' => 'show')))
            ;
    }
    
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add("factura",null,array('label' => 'Factura'))
            ->add("articulo",null,array('label' => 'Artículo'))
            ;
    }
    
    public function configureShowFields(\Sonata\AdminBundle\Show\ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add("factura",null,array('label' => 'Factura'))
            ->add("articulo",null,array('label' => 'Artículo'))
            ->add("cantidad",null,array('label' => 'Cantidad'))
            ->add("precioUnitario",null,array('label' => 'Precio unitario'))
            ->add("subtotal",null,array('label' => 'Subtotal'))
            ;                
    }
}
