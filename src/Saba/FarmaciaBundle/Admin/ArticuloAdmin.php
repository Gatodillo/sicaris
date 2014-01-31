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
 * Description of ArticuloAdmin
 *
 * @author victor
 */
class ArticuloAdmin extends Admin{
    
    /*
     * Campos que será desplegados al editar un artícuyo.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form->add('nombreComercial', null, array('label'=>'Nombre comercial'))
                ->add('codigoDeBarras',null,array('label'=>'Código de barras'))
                ->add('estaActivo',null,array('label'=>'Activo'))
                ;
    }
    
    /*
     * Campos que será desplegados al mostrar los datos de un artícuyo en 
     * particular.
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter->add('nombreComercial', null, array('label'=>'Nombre comercial'))
                ->add('codigoDeBarras',null,array('label'=>'Código de barras'))
                ->add('estaActivo',null,array('label'=>'Activo'))
                ;
    }

    /*
     * Campos que será desplegados al desplegar la tabla con los datos de todos
     * los artículos.
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list->add('nombreComercial', null, 
                array('label'=>'Nombre comercial',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('codigoDeBarras',null,array('label'=>'Código de barras',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('estaActivo',null,array('label'=>'Activo'))
                ;
    }
    
    /*
     * Campos que será desplegados al filtrar los datos de los artículos.
     */
    public function configureDatagridFilters(DatagridMapper $datagrid){
        $datagrid->add('nombreComercial', null, array('label'=>'Nombre comercial'))
                ->add('codigoDeBarras',null,array('label'=>'Código de barras'))
                ;
    }
    
}
