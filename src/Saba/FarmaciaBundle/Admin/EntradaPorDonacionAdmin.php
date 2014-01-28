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
 * Description of EntradaPorDonacionAdmin
 *
 * @author victor
 */
class EntradaPorDonacionAdmin extends Admin{
    
    
    /*
     * 
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
            ->add('nea', null, array('label' => 'NEA'))
            ->add('oficio', null, array('label' => 'Folio del oficio'))
            ;
    }
    
    /**
     * 
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add('nea', null, array('label' => 'NEA'))
            ->add('oficio', null, array('label' => 'Folio del oficio'))
            ;
    }
    
    /**
     * 
     */
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add('nea', null, array('label' => 'NEA'))
            ->add('oficio', null, array('label' => 'Folio del oficio'))
            ;
    }
    
    /**
     * 
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->add('nea', null, 
                    array('label' => 'NEA',
                        'route' => array('name' => 'show')))
            ->add('oficio', null, 
                    array('label' => 'Folio del oficio',
                        'route' => array('name' => 'show')))
            ;
    }
}
