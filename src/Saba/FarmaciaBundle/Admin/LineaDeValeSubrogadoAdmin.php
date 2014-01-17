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
 * Description of LineaDeValeSubrogadoAdmin
 *
 * @author victor
 */
class LineaDeValeSubrogadoAdmin extends Admin{
    /**
     *  Campos que serán mostrado en los formularios para desplegar o editar 
     * información.
     */
    public function configureFormFields(FormMapper $formMapper){
        $formMapper
                //->add('medicamento', 'sonata_type_model_list')
                ->add('medicamento', 'genemu_jqueryselect2_entity', array(
                    'class' => 'Saba\FarmaciaBundle\Entity\Medicamento',
                    'property' => 'nombre',
                    ))
                ->add('cantidad','text')
                ->add('unidad', 'text', array('label'=>'Unidad'))
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
                ->add('cantidad', null, array('label'=>'Cantidad'))
                ->add('unidad', null, array('label'=>'Unidad'))
                ;
    }
    
    public function preUpdate($object) {
        parent::preUpdate($object);
        $receta = $object->getValeSubrogado();
    }
    
    public function prePersist($object) {
        parent::prePersist($object);
        $receta = $object->getValeSubrogado();
    }      
}