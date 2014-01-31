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
            ->add("concentracion", null , array('label' => 'Concentración'))    
            ->add("formaFarmaceutica", null , array('label' => 'Forma farmacéutica'))
            ->add("subfamilia", null, array('label' => 'Subfamilia'))                
            ->add("grupo", null , array('label' => 'Grupo'))
            ->add("especialidad", null , array('label' => 'Especialidad'))
            ->add("indicaciones", null , array('label' => 'Indicaciones'))
            ->add("nivel", null , array('label' => 'Nivel'))
            ->add("nombresComerciales", null, array('by_reference' => null,'multiple'=>true, 'expanded'=>false))    
        ;
    }
    
    // Campos que serán mostrados en los formularios con los filtros
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        /*$variantes = $this
                ->modelManager
                ->createQuery('SabaFarmaciaBundle:VarianteDeMedicamento', 'vm')
                ->orderBy('vm.nombreComercial', 'ASC')
                ->getQuery()
                ->getResult();
        
        $opciones = array();
        foreach($variantes as $variante){
            $opciones[$variante->getId()] = $variante->getNombreComercial();
        }
        
        ->add('variantes', null, array('label' => 'Nombre Comercial'), null, array(
                'expanded' => true,
                'multiple' => true,
                'query_builder' => function (\Doctrine\ORM\EntityRepository $repository) {
                    return $repository->createQueryBuilder('t')
                        ->add('orderBy', 't.nombreComercial ASC');
                    }
            ))*/
            
        $datagridMapper
            ->add('nombreGenerico', null, array('label' => 'Nombre genérico'))
            ->add("formaFarmaceutica", null, array('label' => 'Forma farmacéutica'))
            ->add("subfamilia", null, array('label' => 'Subfamilia'))
        ;
    }
    
     // Campos que serán mostrados en las tablas (listas) de resultados
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombreGenerico', null, array(
                'label' => 'Nombre genérico',
                'routes' => array('name' => 'show')))
            ->addIdentifier('concentracion', null, array('label' => 'Concentración',
                'routes' => array('name' => 'show')))
            ->addIdentifier('formaFarmaceutica', null, array('label' => 'Forma farmacéutica',
                'routes' => array('name' => 'show')))
            ->addIdentifier('subfamilia.familia', null, array('label' => 'Familia',
                'routes' => array('name' => 'show')))
            ->addIdentifier('subfamilia', null, array('label' => 'Subfamilia',
                'routes' => array('name' => 'show')))
            ->addIdentifier('grupo', null, array('label' => 'Grupo',
                'routes' => array('name' => 'show')))
            ->addIdentifier('especialidad', null, array('label' => 'Especialidad',
                'routes' => array('name' => 'show')))
            ->addIdentifier('nivel', null, array('label' => 'Nivel',
                'routes' => array('name' => 'show')))
            ->addIdentifier('indicaciones', null, array('label' => 'Indicaciones',
                'routes' => array('name' => 'show')))
                
                
        ;
    }
}
