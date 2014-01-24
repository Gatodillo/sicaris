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
 * Description of FamiliaAdmin
 *
 * @author victor
 */
class FamiliaAdmin extends Admin{
    /*
     * Campos que será desplegados al editar una familia.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form->add('clave', null, array('label'=>'Clave'))
                ->add('tipoDeAlmacen',null,array('label'=>'Tipo de almacén'))
                ->add('estaActiva',null,array('label'=>'Activa'))
                ->add('familiaPadre','sonata_type_model_list',
                        array('label'=> 'Familia Padre',
                            'required'=> false))
                ;
    }
    
    /*
     * Campos que será desplegados al mostrar los datos de un artícuyo en 
     * particular.
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter->add('clave', null, array('label'=>'Clave'))
                ->add('tipoDeAlmacen',null,array('label'=>'Tipo de almacén'))
                ->add('estaActiva',null,array('label'=>'Activa'))
                ->add('familiaPadre',null,array('label'=>'Familia padre'))
                ;
    }

    /*
     * Campos que será desplegados al desplegar la tabla con los datos de todas
     * las familias.
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list->add('clave', null, 
                array('label'=>'Clave',
                    'route'=> array('name'=>'show')))
                ->add('tipoDeAlmacen',null,array('label'=>'Tipo de almacén',
                    'route'=> array('name'=>'show')))
                ->add('estaActiva',null,array('label'=>'Activa',
                    'route'=> array('name'=>'show')))
                ->add('familiaPadre',null,array('label'=>'Familia padre',
                    'route'=> array('name'=>'show')))
                ;
    }
    
    /*
     * Campos que será desplegados al filtrar los datos de los artículos.
     */
    public function configureDatagridFilters(DatagridMapper $datagrid){
        $datagrid->add('clave', null, array('label'=>'Clave'))
                ->add('tipoDeAlmacen',null,array('label'=>'Tipo de almacén'))
                ->add('estaActiva',null,array('label'=>'Activa'))
                ->add('familiaPadre',null,array('label'=>'Familia padre'))
                ;
    }
    
}
