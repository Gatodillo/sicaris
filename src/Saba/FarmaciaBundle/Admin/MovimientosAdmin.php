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
 * Description of MovimientosAdmin
 *
 * @author victor
 */
class MovimientosAdmin extends Admin{
    
    /**
     * Campos quie serán desplegados en el formulario para edición de movimientos
     * @param \Sonata\AdminBundle\Form\FormMapper $form
     */
    public function configureFormFields(FormMapper $form) {
        parent::configureFormFields($form);
        $form->add("articulo")
                ->add("cantidad")
                
            ;   
        
    }
    
    public function configureListFields(ListMapper $list) {
        parent::configureListFields($list);
        $list->add("articulo")
             ->add("cantidad")
             ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                )
            ));   
        
    }
    
}
