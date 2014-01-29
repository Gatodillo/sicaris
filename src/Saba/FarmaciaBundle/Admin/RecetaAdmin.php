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
use Sonata\AdminBundle\Show\ShowMapper;

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
            ->add('recetaPadre', null, 
                    array('label' => 'Receta padre',
                        'required' => false))                
            ->add("centroDeCostos",null,array('label' => 'Centro de Costos', 'required' => false))
            ->add("medico", "sonata_type_model_list",array('required' => false))
            ->add("paciente", "sonata_type_model_list",array('required' => false))
            ->add("tipoDeReceta", "sonata_type_model_list",array('label' => "Tipo"))    
            ->add("estado", null,array(
                'required' => false,
                'label' => 'Situación',
                'attr' => array(
                    'class' => 'select2'
                    ),
                ))
            ->add('valeSubrogado', null, array('label' => 'Vale subrogado', 'disabled' => true))    
            ->end()
            ->with("Líneas de receta")    
                ->add("lineasDeReceta", 'sonata_type_collection', array(
                    'by_reference' => false,
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
            //->addIdentifier("folio", null, array('label' => 'Folio'))    
            ->addIdentifier("folio", null, array('route' => array('name' => 'show')))
            ->addIdentifier("medico.cedula", null, array('label' => 'Médico'))
            ->addIdentifier("paciente.numeroDeAfiliacion", null, array('label' => 'Paciente'))
            ->addIdentifier("valeSubrogado", null, array('label' => 'Vale subrogado'))
            ->add("estado", null, array('label' => 'Situación'))
            ;
    }    
    
    // Fields to be shown on lists
    protected function configureShowFields(ShowMapper $listMapper)
    {
        $listMapper
            //->addIdentifier("folio", null, array('label' => 'Folio'))    
            ->add("folio", null, array('label' => 'Folio'))
            ->add("medico.cedula", null, array('label' => 'Médico'))
            ->add("paciente.numeroDeAfiliacion", null, array('label' => 'Paciente'))
            ->add("valeSubrogado", null, array('label' => 'Vale subrogado'))
            ->add("estado", null, array('label' => 'Situación'))
            ;
    }    
    
public function preUpdate($receta) {
        $receta->setLineasDeReceta($receta->getLineasDeReceta());
        
        $query = $this->getModelManager()->createQuery($this->getClass(), 'entity'); 
        $query->select ('estado')
            ->from("Saba\FarmaciaBundle\Entity\EstadoDeReceta", "estado")
            ->where("estado.id=:id")
            ->setParameter("id",1);
        
        //->execute()
        //$mmm = $query->getSingleResult();
        //$receta->setEstado($mmm);
    }
    
    public function prePersist($receta) {
        $receta->setLineasDeReceta($receta->getLineasDeReceta());
    }
    
}
