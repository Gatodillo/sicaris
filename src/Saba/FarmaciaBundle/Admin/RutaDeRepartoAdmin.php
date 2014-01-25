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
 * Description of RutaDeRepartoAdmin
 *
 * @author victor
 */
class RutaDeRepartoAdmin extends Admin{
    
    /*
     * Campos que será desplegados al editar un artícuyo.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
                ->add('descripcion', null, array('label'=>'Descripción'))
                ;
    }
    
    /*
     * Campos que será desplegados al mostrar los datos de un artícuyo en 
     * particular.
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
                ->add('descripcion', null, array('label'=>'Descripción'))
                ;
    }

    /*
     * Campos que será desplegados al desplegar la tabla con los datos de todos
     * los artículos.
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
                ->addIdentifier('descripcion', null, 
                array('label'=>'Descripción',
                    'route'=> array('name'=>'show')))
                ;
    }
    
    /*
     * Campos que será desplegados al filtrar los datos de los artículos.
     */
    public function configureDatagridFilters(DatagridMapper $datagrid){
        $datagrid
                ->add('descripcion', null, array('label'=>'Descripción'))
                ;
    }
    
}
