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
 * Description of RecetaTieneLineasAdmin
 *
 * @author victor
 */
class RecetaTieneLineasAdmin extends Admin {
    
    /*
     * Campos que serán mostrado en los formularios para 
     * desplegar o editar información.
     */
    public function configureFormFields(FormMapper $formMapper) {
      /*if ($this->hasRequest()) {
            $link_parameters = array('context' => $this->getRequest()->get('context'));
        } else {
            $link_parameters = array();
        }
*/
        $formMapper
            ->add('lineaDeReceta', 'sonata_type_admin', array(
                'required' => false,
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
            ))
        ;      
        
    }
    
      // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add("folio", null, array('label' => 'Folio'))    
            ->addIdentifier("medico.nombre", null, array('label' => 'Médico'))
            ->addIdentifier("paciente.nombre", null, array('label' => 'Paciente'))
            ;
    }
    
    public function preUpdate($object) {
        parent::preUpdate($object);
        foreach($object->getLineasDeReceta() as $lineaDeReceta ){
            $lineaDeReceta->setReceta($object->getReceta());
        }
    }
    
    public function prePersist($object) {
        parent::prePersist($object);
        foreach($object->getLineasDeReceta() as $lineaDeReceta ){
            $lineaDeReceta->setReceta($object->getReceta());
        }
    }   
    
}
