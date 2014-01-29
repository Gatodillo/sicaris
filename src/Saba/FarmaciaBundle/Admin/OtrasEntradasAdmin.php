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
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Description of OtrasEntradasAdmin
 *
 * @author victor
 */
class OtrasEntradasAdmin extends Admin{
    
    
    /*
     * 
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
            ->add('numero', null, array('label' => 'Número'))
            ->add('folioDeOficio', null, array('label' => 'Oficio'))
            ->add('tipoDeEntrada')                    
            ->add('proveedor')                
            ->add('fechaDeRecepcion', null, array('label' => 'Fecha de recepción'))
            ->add('movimientos', "sonata_type_collection", 
                    array("label"=>"Movimientos", 'by_reference' => 'false'
                        ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ))
            ;
    }
    
    /**
     * 
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add('numero', null, array('label' => 'Número'))
            ->add('folioDeOficio', null, array('label' => 'Oficio'))
            ->add('proveedor')                
            ->add('fechaDeRecepcion', null, array('label' => 'Fecha de recepción'))
            ;
    }
    
    /**
     * 
     */
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add('numero', null, array('label' => 'Número'))
            ->add('folioDeOficio', null, array('label' => 'Oficio'))
            ->add('proveedor')                
            ->add('fechaDeRecepcion', null, array('label' => 'Fecha de recepción'))
            ;
    }
    
    /**
     * 
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier('numero', null, 
                    array('label' => 'Número',
                        'route' => array('name' => 'show')))
            ->addIdentifier('folioDeOficio', null, 
                    array('label' => 'Orden',
                        'route' => array('name' => 'oficio')))
            ;
    }
}
