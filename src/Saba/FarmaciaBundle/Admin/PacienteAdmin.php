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
 * Description of PacienteAdmin
 *
 * @author victor
 */
class PacienteAdmin extends Admin {
    // Campos que serán mostrado en los formularios para 
    // desplegar o editar información.
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('numeroDeAfiliacion', 'text', array('label' => 'Afiliación'))
            ->add("apellidoPaterno", 'text', array('label' => 'Apellido paterno'))
            ->add("apellidoMaterno", 'text', array('label' => 'Apellido materno'))
            ->add("nombresdePila", 'text', array('label' => 'Nombre(s)'))    
        ;
    }
    
    // Campos que serán mostrados en los formularios con los filtros
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('numeroDeAfiliacion', null, array('label' => 'Afiliación'))
            ->add("apellidoPaterno", null, array('label' => 'Apellido paterno'))
            ->add("apellidoMaterno", null, array('label' => 'Apellido materno'))
            ->add("nombresDePila", null, array('label' => 'Nombre(s)'))    
                
        ;
    }
    
     // Campos que serán mostrados en las tablas (listas) de resultados
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('numeroDeAfiliacion', null, array('label' => 'Afiliación'))
            ->add("apellidoPaterno", null, array('label' => 'Apellido paterno'))
            ->add("apellidoMaterno", null, array('label' => 'Apellido materno'))
            ->add("nombresdePila", null, array('label' => 'Nombre(s)'))

        ;
    }
}
