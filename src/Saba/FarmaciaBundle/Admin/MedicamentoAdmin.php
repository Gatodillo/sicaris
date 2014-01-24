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
 * Description of MedicamentoAdmin
 *
 * @author victor
 */
class MedicamentoAdmin extends Admin {
// Campos que serán mostrado en los formularios para 
    // desplegar o editar información.
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombreGenerico', 'text', array('label' => 'Nombre genérico'))
            ->add('nombreComercial', 'text', array('label' => 'Nombre comercial'))    
            ->add("codigoDeBarras", 'text', array('label' => 'Código de barras'))
        ;
    }
    
    // Campos que serán mostrados en los formularios con los filtros
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombreGenerico', null, array('label' => 'Nombre genérico'))
            ->add('nombreComercial', null, array('label' => 'Nombre comercial'))
            ->add("codigoDeBarras", null, array('label' => 'Código de barras'))
        ;
    }
    
     // Campos que serán mostrados en las tablas (listas) de resultados
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nombreGenerico', null, array('label' => 'Nombre genérico'))
            ->add('nombreComercial', null, array('label' => 'Nombre comercial'))
            ->add("codigoDeBarras", null, array('label' => 'Código de barras'))

        ;
    }
}
