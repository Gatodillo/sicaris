<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Description of VarianteDeMedicamentoAdmin
 *
 * @author victor
 */
class VarianteDeMedicamentoAdmin extends Admin {
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de una variante de medicamentos.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form
            ->add('nombreComercial', null, array('label' => 'Nombre comercial'))                                
            ->add("formaFarmaceutica",null, array("label"=>"Forma"))
            ->add("concentracion",null, array("label"=>"Concentración"))
            ->add("unidadInternacional",null, array("label"=>"Unidad"))
            ->add("envaseSecundario",null, array("label"=>"Envase"))
            ;
    }
    
    
    /*
     * 
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("nombreComercial",null, array("label"=>"Nombre comercial",
                'route'=> array('name'=>'show')))
            ->addIdentifier("formaFarmaceutica",null, array("label"=>"Forma",
                'route'=> array('name'=>'show')))
            ->addIdentifier("descripcion",null, array("label"=>"Descripción",
                'route'=> array('name'=>'show')))
            ->addIdentifier("estaActivo",null, array("label"=>"Activo",
                'route'=> array('name'=>'show')))
            ;
    }
    
    public function configureShowFields(\Sonata\AdminBundle\Show\ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add('nombreComercial', null, array('label' => 'Nombre comercial'))                                
            ->add("formaFarmaceutica",null, array("label"=>"Forma"))
            ->add("concentracion",null, array("label"=>"Descripción"))
            ->add("unidadInternacional",null, array("label"=>"Activo"))
            ->add("envaseSecundario",null, array("label"=>"Envase"))
            ;
    }
    
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add('nombreComercial', null, array('label' => 'Nombre comercial'))    
            ->add("formaFarmaceutica",null, array("label"=>"Forma"))
            ->add("concentracion",null, array("label"=>"Descripción"))
            ->add("unidadInternacional",null, array("label"=>"Activo"))
            ->add("envaseSecundario",null, array("label"=>"Envase"))
            ;                
    }
}
