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
 * Description of GrupoDeMedicamentoAdmin
 *
 * @author victor
 */
class GrupoDeMedicamentoAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de un grupo de medicamentos.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form
            ->add("clave",null, array("label"=>"Clave"))
            ->add("descripcion",null, array("label"=>"Descripción"))
            ->add("estaEnCuadro",null, array("label"=>"Está en cuadro"))
            ->add("estaActivo",null, array("label"=>"Activo"))                
            ;
    }
    
    
    /*
     * 
     */
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("clave",null, array("label"=>"Clave",
                'route'=> array('name'=>'show')))
            ->addIdentifier("descripcion",null, array("label"=>"Descripción",
                'route'=> array('name'=>'show')))
            ->addIdentifier("estaEnCuadro",null, array("label"=>"Está en cuadro",
                'route'=> array('name'=>'show')))
            ->addIdentifier("estaActivo",null, array("label"=>"Activo",
                'route'=> array('name'=>'show')))
            ;
    }
    
    public function configureShowFields(\Sonata\AdminBundle\Show\ShowMapper $filter) {
        parent::configureShowFields($filter);
        $filter
            ->add("clave",null, array("label"=>"Clave"))
            ->add("descripcion",null, array("label"=>"Descripción"))
            ->add("estaEnCuadro",null, array("label"=>"Está en cuadro"))
            ->add("estaActivo",null, array("label"=>"Activo"))                
            ;
    }
    
    public function configureDatagridFilters(DatagridMapper $filter) {
        parent::configureDatagridFilters($filter);
        $filter
            ->add("clave",null, array("label"=>"Clave"))
            ->add("descripcion",null, array("label"=>"Descripción"))
            ->add("estaEnCuadro",null, array("label"=>"Está en cuadro"))
            ->add("estaActivo",null, array("label"=>"Activo"))                
            ;                
    }
}
