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
 * Description of TipoDeRecetaAdmin
 *
 * @author victor
 */
class TipoDeRecetaAdmin extends Admin{
    
    /*
     * Campos que será desplegados al editar un tipo de receta.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
                ->add('nombre', null, array('label'=>'Nombre genérico'))
                ->add('estaActivo',null,array('label'=>'Activo'))
                ;
    }
    
    /*
     * Campos que será desplegados al mostrar los datos de un tipo de receta en 
     * particular.
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
                ->add('nombre', null, array('label'=>'Nombre'))
                ->add('estaActivo',null,array('label'=>'Activo'))
                ;
    }

    /*
     * Campos que será desplegados al desplegar la tabla con los datos de todos
     * los tipos de receta.
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
                ->addIdentifier('nombre', null, 
                array('label'=>'Nombre',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('estaActivo',null,array('label'=>'Activo',
                    'route'=> array('name'=>'show')))
                ;
    }
    
    /*
     * Campos que será desplegados al filtrar los datos de los tipos de receta.
     */
    public function configureDatagridFilters(DatagridMapper $datagrid){
        $datagrid
                ->add('nombre', null, array('label'=>'Nombre'))
                ->add('estaActivo',null,array('label'=>'Activo'))
                ;
    }
    
}
