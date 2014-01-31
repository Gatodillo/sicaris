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
 * Description of LineasDeRecetaAdmin
 *
 * @author victor
 */
class LineaDeRecetaAdmin extends Admin{
    /**
     *  Campos que serán mostrado en los formularios para desplegar o editar 
     * información.
     */
    public function configureFormFields(FormMapper $formMapper){
        $formMapper
                ->add('medicamento', null, array('label' => 'Medicamento' ))
                ->add('indicaciones', null, array('label' => 'Indicaciones' ))
                ;
    }
    
    /**
     * Campos que serán mostrados en los formularios con los filtros
     */
    public function configureDatagridFilters(DatagridMapper $datagridMapper){
    }
    
    /**
     * Campos que serán mostrados en las tablas (listas) de resultados
     */
    public function configureListFields(ListMapper $listMapper){
        $listMapper
                ->add('medicamento', null, array("label" => "Medicamento")) 
                ->add('indicaciones', null, array("label" => "Indicaciones")) 
                ;
    }
}