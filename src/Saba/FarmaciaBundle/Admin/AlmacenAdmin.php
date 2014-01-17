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
class AlmacenAdmin extends Admin{
    
    /*
     * Campos que serán desplegados en el formulario para edición
     * de los datos de un almnacén.
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form
            ->add("nombre")
            ->add("almacenPadre",null, array("label"=>"almacén padre"))
            ;
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list
            ->addIdentifier("nombre")
            ->addIdentifier("almacenPadre",null, array("label"=>"almacén padre"))
            ;
    }
}
