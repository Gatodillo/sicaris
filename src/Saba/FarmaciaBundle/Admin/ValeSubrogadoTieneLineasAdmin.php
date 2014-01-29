<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;


/**
 * Description of ValeSubrogadoTieneLineasAdmin
 * @deprecated since version 0
 * @author victor
 */
class ValeSubrogadoTieneLineasAdmin extends Admin {
    public function configureFormFields(FormMapper $formMapper) {
    }
    
    protected function configureListFields(ListMapper $listMapper){
    }
    
    public function preUpdate($object){
    }
    
    public function prePersist($object) {
    }   
}
