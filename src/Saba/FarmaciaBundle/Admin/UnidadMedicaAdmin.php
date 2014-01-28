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


/**
 * Description of almacenAdmin
 *
 * @author victor
 */
class UnidadMedicaAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de un almnacén.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form
            ->add("clave")
            ->add("descripcion",null,array("label" => "Descripción"))
            ->add("tipo",null,array("label" => "Tipo"))
            ->add("descripcion",null,array("label" => "Descripción"))
            ->add("region",null,array("label" => "Región"))    
            ->add("nivel",null,array("label" => "Nivel"))
            ->add("clasificacion",null,array("label" => "Clasificación"))    
            ;
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("clave",null,array(
                "label" => "Clave",
                "route" => array("name" => "show")))
            ->addIdentifier("descripcion",null,array(
                "label" => "Descripción",
                "route" => array("name" => "show")))
            ->addIdentifier("Tipo",null,array(
                "label" => "Tipo",
                "route" => array("name" => "show")))    
            ->addIdentifier("region",null,array(
                "label" => "Región",
                "route" => array("name" => "show")))    
            ->addIdentifier("nivel",null,array(
                "label" => "Nivel",
                "route" => array("name" => "show")))    
            ->addIdentifier("clasificacion",null,array(
                "label" => "Clasificacion",
                "route" => array("name" => "show")))    
            ;
    }
    
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add("clave")
            ->add("descripcion",null,array("label" => "Descripción"))
            ->add("tipo",null,array("label" => "Tipo"))
            ->add("region",null,array("label" => "Región"))    
            ->add("nivel",null,array("label" => "Nivel"))
            ->add("clasificacion",null,array("label" => "clasificación"))
            ;
    }
    
    
    public function configureShowFields(\Sonata\AdminBundle\Show\ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add("clave")
            ->add("descripcion",null,array("label" => "Descripción"))
            ->add("tipo",null,array("label" => "Tipo"))
            ->add("descripcion",null,array("label" => "Nivel"))
            ->add("region",null,array("label" => "Región"))    
            ->add("nivel",null,array("label" => "Nivel"))
            ->add("clasificacion",null,array("label" => "Clasificación"))
            ;        
    }
}
