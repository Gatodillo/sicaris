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
 * Description of UnidadResponsableDeCentrosDeCostosAdmin
 *
 * @author victor
 */
class UnidadResponsableDeCentrosDeCostosAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de un almnacén.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        
        $form
            ->add("clave")
            ->add("titular")
            ->add("descripcion")    
            ->add("dependencia")
                
            ;
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("clave",null, array(
                "route"=>array("name" => "show")))
            ->addIdentifier("titular",null, array(
                "route"=>array("name" => "show")))
            ;
    }
}
