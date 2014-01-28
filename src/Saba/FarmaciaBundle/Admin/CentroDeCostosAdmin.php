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
 * Description of CentroDeCostosAdmin
 *
 * @author victor
 */
class CentroDeCostosAdmin extends Admin{
    
    /*
     * Campos que será desplegados al editar un artícuyo.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
                ->add('clave', null, array('label'=>'Clave'))
                ->add('descripcion', null, array('label'=>'Descripción'))
                ->add('titular',null,array('label'=>'Titular'))
                ->add('unidadResponsable',null,array('label'=>'Unidad responsable'))
                ->add('rutaDeReparto',null,array('label'=>'Ruta de reparto'))
                ;
    }
    
    /*
     * Campos que será desplegados al mostrar los datos de un artícuyo en 
     * particular.
     */
    public function configureShowFields(ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
                ->add('clave', null, array('label'=>'Clave'))
                ->add('descripcion', null, array('label'=>'Descripción'))
                ->add('titular',null,array('label'=>'Titular'))
                ->add('unidadResponsable',null,array('label'=>'Unidad responsable'))
                ->add('rutaDeReparto',null,array('label'=>'Ruta de reparto'))
                ;
    }

    /*
     * Campos que será desplegados al desplegar la tabla con los datos de todos
     * los artículos.
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
                ->addIdentifier('clave', null, 
                array('label'=>'Clave',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('descripcion', null, 
                array('label'=>'Descripción',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('titular',null,array('label'=>'Titular',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('unidadResponsable',null,array('label'=>'Unidad responsable',
                    'route'=> array('name'=>'show')))
                ->addIdentifier('rutaDeReparto',null,array('label'=>'Ruta de repardo',
                    'route'=> array('name'=>'show')))
                ;
    }
    
    /*
     * Campos que será desplegados al filtrar los datos de los artículos.
     */
    public function configureDatagridFilters(DatagridMapper $datagrid){
        $datagrid
                ->add('clave', null, array('label'=>'Clave'))
                ->add('descripcion', null, array('label'=>'Descripción'))
                ->add('titular',null,array('label'=>'Titular'))
                ->add('unidadResponsable',null,array('label'=>'Unidad responsable'))
                ->add('rutaDeReparto',null,array('label'=>'Ruta de reparto'))
                ;
    }
    
}
