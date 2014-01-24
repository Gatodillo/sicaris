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
        $form->add('nombreGenerico', null, array('label'=>'Nombre genérico'))
                ->add('descripcion',null,array('label'=>'Descripción'))
                ->add('unidadDeMedida',null,array('label'=>'Unidad de medida'))
                ->add('codigoDeBarras',null,array('label'=>'Código de barras'))
                ;
    }
    
    /*
     * Campos que será desplegados al mostrar los datos de un artícuyo en 
     * particular.
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter->add('nombreGenerico', null, array('label'=>'Nombre genérico'))
                ->add('descripcion',null,array('label'=>'Descripción'))
                ->add('unidadDeMedida',null,array('label'=>'Unidad de medida'))
                ->add('codigoDeBarras',null,array('label'=>'Código de barras'))
                ;
    }

    /*
     * Campos que será desplegados al desplegar la tabla con los datos de todos
     * los artículos.
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list->add('nombreGenerico', null, 
                array('label'=>'Nombre genérico',
                    'route'=> array('name'=>'show')))
                ->add('descripcion',null,array('label'=>'Descripción',
                    'route'=> array('name'=>'show')))
                ->add('unidadDeMedida',null,array('label'=>'Unidad de medida',
                    'route'=> array('name'=>'show')))
                ->add('codigoDeBarras',null,array('label'=>'Código de barras',
                    'route'=> array('name'=>'show')))
                ;
    }
    
    /*
     * Campos que será desplegados al filtrar los datos de los artículos.
     */
    public function configureDatagridFilters(DatagridMapper $datagrid){
        $datagrid->add('nombreGenerico', null, array('label'=>'Nombre genérico'))
                ->add('descripcion',null,array('label'=>'Descripción'))
                ->add('unidadDeMedida',null,array('label'=>'Unidad de medida'))
                ->add('codigoDeBarras',null,array('label'=>'Código de barras'))
                ;
    }
    
}
