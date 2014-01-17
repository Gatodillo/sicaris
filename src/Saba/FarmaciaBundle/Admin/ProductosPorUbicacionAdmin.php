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
 * Description of ProductosPorUbicacionAdmin
 *
 * @author victor
 */
class ProductosPorUbicacionAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de una ubicación.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
            ->add("producto", "sonata_type_model_list", array(
                'label' => "Producto",
            ))
            ->add("cantidad")    
            ;
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->add("ubicacion",null,array("label"=>"Ubicación"))
            ->add("producto",null,array("label"=>"Producto"))
            ->add("cantidad") 
            ;
    }
    
    public function preUpdate($object) {
        parent::preUpdate($object);
        echo $object->getUbicacion();
    }
    
    public function prePersist($object) {
        parent::prePersist($object);
        echo $object->getUbicacion();
    }  
}
