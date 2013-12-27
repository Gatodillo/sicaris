<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Saba\FarmaciaBundle\Entity\SalidaPorReceta;
use Saba\FarmaciaBundle\Form\Type\SalidaPorRecetaType;

/**
 * Description of SalidasPorReceta
 *
 * @author victor
 */
class SalidasPorRecetaController extends Controller {
    
    public function crearAction() {
        $salidaPorReceta = new SalidaPorReceta();
        
        $formulario = $this->createForm(new SalidaPorRecetaType(), $salidaPorReceta);
        return $this->render("SabaFarmaciaBundle:SalidaPorReceta:crear.html.twig",
                array("form" => $formulario->createView()));
    }
    
    public function eliminarAction($id) {
        
    }
    
    public function actualizarAction($id) {
        
    }
    
    public function buscarAction() {
        
    }
}
