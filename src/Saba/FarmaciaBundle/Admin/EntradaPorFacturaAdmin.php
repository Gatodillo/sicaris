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
 * Description of EntradaPorFacturaAdmin
 *
 * @author victor
 */
class EntradaPorFacturaAdmin extends Admin{
    
    
    /*
     * 
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
            ->add('numero', null, array('label' => 'Número'))
            ->add('nea', null, array('label' => 'NEA'))
            ->add('orden', null, array('label' => 'Número'))
            ;
    }
    
    /**
     * 
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add('numero', null, array('label' => 'Número'))
            ->add('nea', null, array('label' => 'NEA'))
            ->add('orden', null, array('label' => 'Número'))
            ;
    }
    
    /**
     * 
     */
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add('numero', null, array('label' => 'Número'))
            ->add('nea', null, array('label' => 'NEA'))
            ->add('orden', null, array('label' => 'Número'))
            ;
    }
    
    /**
     * 
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->add('numero', null, 
                    array('label' => 'Número',
                        'route' => array('name' => 'show')))
            ->add('nea', null, 
                    array('label' => 'NEA',
                        'route' => array('name' => 'show')))
            ->add('orden', null, 
                    array('label' => 'Orden',
                        'route' => array('name' => 'show')))
            ;
    }
}
