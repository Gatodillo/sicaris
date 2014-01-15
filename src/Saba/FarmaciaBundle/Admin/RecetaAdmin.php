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
 * Description of SalidaPorRecetaAdmin
 *
 * @author victor
 */
class RecetaAdmin extends Admin {
    //put your code here
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('folio', 'text', array('label' => 'Folio'))
            ->add("medico", "sonata_type_model_list",array('required' => false))
            ->add("paciente", "sonata_type_model_list",array('required' => false))
            ->end()
            ->with("Líneas de receta")    
                ->add("lineasDeReceta", 'sonata_type_collection', array(
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
            ->addIdentifier("folio", null, array('label' => 'Folio'))    
            ->addIdentifier("medico.cedula", null, array('label' => 'Médico'))
            ->addIdentifier("paciente.numeroDeAfiliacion", null, array('label' => 'Paciente'))
            ;
    }    
    
public function preUpdate($receta) {
        $receta->setLineasDeReceta($receta->getLineasDeReceta());
    }
    
    public function prePersist($receta) {
        $receta->setLineasDeReceta($receta->getLineasDeReceta());
    }
    
}
