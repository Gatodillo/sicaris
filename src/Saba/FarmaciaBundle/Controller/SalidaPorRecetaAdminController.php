<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sonata\PageBundle\Exception\PageNotFoundException;

use Saba\FarmaciaBundle\Entity\SalidaPorReceta;
use Saba\FarmaciaBundle\Entity\Movimiento;
use Saba\FarmaciaBundle\Form\Type\SalidaPorRecetaType;

/**
 * TODO: Validación de cantidades en movimientos.
 * Description of SalidasPorReceta
 *
 * @author victor
 */
class SalidaPorRecetaAdminController extends Controller {
    
    public function createAction() {
                // the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }
        
        $object = $this->admin->getNewInstance();
        
        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod()== 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                
                $repositorio = $this->getDoctrine()->getRepository('SabaFarmaciaBundle:EstadoDeReceta');
                $estado = $repositorio->find( array( 'id' => 1 ));
                $object->setEstado($estado);
                
                /**
                 * Código personalizado.
                 */
                
                //foreach ($object->getReceta()->getLineasDeReceta() as $key => $movimiento){
                foreach ($object->getMovimientos() as $movimiento){
                    $articuloEnMovimiento = $movimiento->getArticulo();
                    $medicamentoEnMovimiento = $articuloEnMovimiento->getMedicamento();
                    $cantidadEnMovimiento = $movimiento->getCantidad();
                    

                    if (!$object->geReceta()
                            ->tieneMedicamento($medicamentoEnMovimiento)){
                        $object->removeMovimiento($movimiento);
                    }
                    
                    $cantidadEnExistencia = $object
                            ->getUbicacionOrigen()
                            ->getExistenciaDe($object->getUbicacionOrigen(),$medicamentoEnMovimiento)
                            ;
                    if ($cantidadEnExistencia >= $cantidadEnMovimiento){
                        $object->getUbicacionOrigen()
                                ->updateExistencias(
                                        $medicamentoEnMovimiento,
                                        $cantidadEnMovimiento
                                );
                        $object->aniadirAMovimientos(
                                $medicamentoEnMovimiento,
                                $cantidadEnMovimiento
                                );
                    }else if ($cantidadEnExistencia > 0){
                        $object->getUbicacionOrigen()
                                ->updateExistencias(
                                        $medicamentoEnMovimiento,
                                        0
                                );

                        $object->aniadirAMovimientos($medicamentoEnMovimiento, 
                                        $cantidadEnExistencia);
                        $object->aniadirAValeSubrogado(
                                $medicamentoEnMovimiento,
                                $cantidadEnMovimiento -
                                $cantidadEnExistencia
                                );
                    }else{
                        $object->aniadirAValeSubrogado(
                                $medicamentoEnMovimiento,
                                $cantidadEnMovimiento
                                );
                    }
                }
                
                
                
                /*
                 * Fin del código personalizado.
                 */
                
                
                //$object->getValeSubrogado()->setRecetaOrigen($object->getReceta());
                $this->admin->create($object);

                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result' => 'ok',
                        'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', $this->admin->trans('flash_create_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', 'flash_create_error');
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'create',
            'form'   => $view,
            'object' => $object,
        ));
    }

    public function editAction($id = null){
            // the key used to lookup the template
        $templateKey = 'edit';

        $id = $this->get('request')->get($this->admin->getIdParameter());
        $object = $this->admin->getObject($id);

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id : %s', $id));
        }

        if (false === $this->admin->isGranted('EDIT', $object)) {
            throw new AccessDeniedException();
        }

        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {

                /**
                 * Código personalizado.
                 * TODO: Definir los estados de este documento.
                 * y eliminar el uso del método getEstado()->getId()
                 */
                $estado = $object->getEstado()->getId();
                if (null != $object->getReceta()->getValeSubrogado()){
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_edit_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                    // redirect to edit mode
                    return $this->redirectTo($object);
                }

                /*Se hace una doble recorrido del arreglo de movimientos.
                 * En la primer iteración. se busca que todos los medicamentos 
                 * existan en la reseta. Aquellos que no, son eliminados sin más.
                 */
                foreach ($object->getMovimientos() as $movimiento){
                    $articuloEnMovimiento = $movimiento->getArticulo();
                    $medicamentoEnMovimiento = $articuloEnMovimiento->getMedicamento();
                    $cantidadEnMovimiento = $movimiento->getCantidad();
                    
                    
                    //$unidadDelMedicamentoEnReceta = $lineaDeReceta->getUnidad();
                    
                     if (!$object->getReceta()
                            ->tieneMedicamento($medicamentoEnMovimiento)){
                        $object->removeMovimiento($movimiento);
                        $this->addFlash('sonata_flash_error', $this->admin->trans('flash_edit_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                    }
                    $this->admin->update($object);
                }
                
                foreach ($object->getMovimientos() as $movimiento){
                    $articuloEnMovimiento = $movimiento->getArticulo();
                    $medicamentoEnMovimiento = $articuloEnMovimiento->getMedicamento();
                    $cantidadEnMovimiento = $movimiento->getCantidad();
                    
                    
                    //$unidadDelMedicamentoEnReceta = $lineaDeReceta->getUnidad();
                    
                     if (!$object->getReceta()
                            ->tieneMedicamento($medicamentoEnMovimiento)){
                        $object->removeMovimiento($movimiento);
                        $this->admin->update($object);
                        $this->addFlash('sonata_flash_error', $this->admin->trans('flash_edit_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                        return $this->redirectTo($object);
                    }
                    
                    $cantidadEnExistencia = $object
                            ->getUbicacionOrigen()
                            ->getExistenciaDe($object->getUbicacionOrigen(),$articuloEnMovimiento)
                            ;
                    if ($estado == 2 && $cantidadEnExistencia >= $cantidadEnMovimiento){
                        $object->getUbicacionOrigen()
                                ->updateExistencias(
                                        $articuloEnMovimiento,
                                        ($cantidadEnExistencia - $cantidadEnMovimiento)
                                );
                    }else if ($estado == 2 && $cantidadEnExistencia > 0){
                        $object->getUbicacionOrigen()
                                ->updateExistencias(
                                        $articuloEnMovimiento,
                                        0
                                );
                        $movimiento->setCantidad($cantidadEnExistencia);
                        $object->aniadirAValeSubrogado(
                                $medicamentoEnMovimiento,
                                $cantidadEnMovimiento -
                                $cantidadEnExistencia
                                );
                    }else if ($estado == 2 && $cantidadEnExistencia == 0) {
                        $movimiento->setCantidad(0);
                        $object->removeMovimiento($movimiento);
                        $object->aniadirAValeSubrogado(
                                $medicamentoEnMovimiento,
                                $cantidadEnMovimiento
                                );
                    }
                }
                
                /*
                 * Si el estado de la salida cambia a 2) Confirmada, la receta
                 * cambia su estado a 2) Confirmada.
                 */
                if ($estado == 2){
                    $repositorio = $this->getDoctrine()->getRepository('SabaFarmaciaBundle:EstadoDeReceta');
                    $estado = $repositorio->find( array( 'id' => 2 ));
                    $object->getReceta()->setEstado($estado);
                }
                
                /*
                 * Fin del código personalizado.
                 */
                
                
                $this->admin->update($object);

                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                        'result'    => 'ok',
                        'objectId'  => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', $this->admin->trans('flash_edit_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_edit_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                }
            } elseif ($this->isPreviewRequested()) {
                // enable the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        return $this->render($this->admin->getTemplate($templateKey), array(
            'action' => 'edit',
            'form'   => $view,
            'object' => $object,
        ));
    }
}

/*
         $medico = $this->getReceta()->getMedico();
        $paciente = $this->getReceta()->getPaciente();
        
        
 
 * 
 
 */