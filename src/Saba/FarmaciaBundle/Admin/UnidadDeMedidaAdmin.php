<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

/**
 * Description of UnidadDeMedidaAdmin
 *
 * @author victor
 */
class UnidadDeMedidaAdmin extends Admin{
    
    /*
     * Campos que será desplegados al editar un artícuyo.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
                ->add('nombre', null, array('label'=>'Nombre genérico'))
                ->add('abreviacion', null, array('label'=>'abreviación'))
                ->add('estaActiva',null,array('label'=>'Activa'))
                ;
    }
    
    /*
     * Campos que será desplegados al mostrar los datos de un artícuyo en 
     * particular.
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
                ->add('nombre', null, array('label'=>'Nombre genérico'))
                ->add('abreviacion', null, array('label'=>'abreviación'))
                ->add('estaActiva',null,array('label'=>'Activa'))
                ;
    }

    /*
     * Campos que será desplegados al desplegar la tabla con los datos de todos
     * los artículos.
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
                ->addIdentifier('nombre', null, 
                array('label'=>'Nombre',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('abreviacion', null, 
                array('label'=>'Abreviación',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('estaActiva',null,array('label'=>'Activa',
                    'route'=> array('name'=>'show')))
                ;
    }
    
    /*
     * Campos que será desplegados al filtrar los datos de los artículos.
     */
    public function configureDatagridFilters(DatagridMapper $datagrid){
        $datagrid
                ->add('nombre', null, array('label'=>'Nombre'))
                ->add('abreviacion', null, array('label'=>'abreviación'))
                ->add('estaActiva',null,array('label'=>'Activa'))
                ;
    }
    
}
