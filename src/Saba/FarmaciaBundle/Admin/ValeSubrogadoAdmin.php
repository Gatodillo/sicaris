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
 * Description of PorValeSubrogadoAdmin
 *
 * @author victor
 */
class ValeSubrogadoAdmin extends Admin {
    //put your code here
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('recetaOrigen', 'text', array('label' => 'Receta', 'disabled' => true))    
            ->add('folio', 'text', array('label' => 'Folio'))
            ->add("medico", "sonata_type_model_list",array('required' => false))
            ->add("paciente", "sonata_type_model_list",array('required' => false))
            ->end()
            ->with("Medicamentos")    
                ->add("lineasDeValeSubrogado", 'sonata_type_collection', array(
                    'by_reference' => false
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position',
                ))
                ->end()
            ;
    }
    
    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
       $datagridMapper
            ->add('folio', null, array('label' => 'Folio'))
                ;
    }
    
     // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier("recetaOrigen", null, array('label' => 'Receta'))    
            ->addIdentifier("folio", null, array('label' => 'Folio'))    
            ->addIdentifier("medico.cedula", null, array('label' => 'Médico'))
            ->addIdentifier("paciente.numeroDeAfiliacion", null, array('label' => 'Paciente'))
            ;
    }    
    
public function preUpdate($receta) {
        $receta->setLineasDeValeSubrogado($receta->getLineasDeValeSubrogado());
    }
    
    public function prePersist($receta) {
        $receta->setLineasDeValeSubrogado($receta->getLineasDeValeSubrogado());
    }
    
}
