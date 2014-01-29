<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Movimiento
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="movimientos_de_salida_por_receta") 
 */
class MovimientoDeSalidaPorReceta extends Movimiento{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="SalidaPorReceta", inversedBy="movimientos")
     * @ORM\JoinColumn(name="salida_por_receta_id")
     */
    private $salidaPorReceta;

   

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

  

    /**
     * Set nea
     *
     * @param \Saba\FarmaciaBundle\Entity\SalidaPorReceta salidaPorReceta
     * @return MovimientoDeSalidaPorReceta
     */
    public function setSalidaPorReceta(\Saba\FarmaciaBundle\Entity\SalidaPorReceta $salidaPorReceta = null)
    {
        $this->salidaPorReceta = $salidaPorReceta;

        return $this;
    }

    /**
     * Get nea
     *
     * @return \Saba\FarmaciaBundle\Entity\SalidaPorReceta
     */
    public function getSalidaPorReceta()
    {
        return $this->salidaPorReceta;
    }
}
