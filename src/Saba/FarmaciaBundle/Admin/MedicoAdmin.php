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
 * Description of MedicoAdmin
 *
 * @author victor
 */
class MedicoAdmin extends Admin {
// Campos que serán mostrado en los formularios para 
    // desplegar o editar información.
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('cedula', 'text', array('label' => 'Número'))
            ->add("apellidoPaterno", 'text', array('label' => 'Apellido paterno'))
            ->add("apellidoMaterno", 'text', array('label' => 'Apellido materno'))
            ->add("nombresdePila", 'text', array('label' => 'Nombre(s)'))    
            ->add("centroDeCostos", null, array('label' => 'Centro de Costos'))
            ->add("especialidad", null, array('label' => 'Especialidad'))            
        ;
    }
    
    // Campos que serán mostrados en los formularios con los filtros
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('cedula', null, array('label' => 'Número'))
            ->add("apellidoPaterno", null, array('label' => 'Apellido paterno'))
            ->add("apellidoMaterno", null, array('label' => 'Apellido materno'))
            ->add("nombresDePila", null, array('label' => 'Nombre(s)'))    
        ;
    }
    
     // Campos que serán mostrados en las tablas (listas) de resultados
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('cedula', null, array('label' => 'Número'))
            ->add("apellidoPaterno", null, array('label' => 'Apellido materno'))
            ->add("apellidoMaterno", null, array('label' => 'Apellido materno'))
            ->add("nombresDePila", null, array('label' => 'Nombre(s)'))                    
        ;
    }
}
