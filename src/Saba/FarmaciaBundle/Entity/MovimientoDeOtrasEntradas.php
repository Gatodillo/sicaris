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
 * @ORM\Table(name="movimientos_de_otras_entradas") 
 */
class MovimientoDeOtrasEntradas extends Movimiento{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="OtrasEntradas", inversedBy="movimientos")
     * @ORM\JoinColumn(name="otras_entradas_id")
     */
    private $otrasEntradas;

    /**
     *
     * @ORM\Column(name="fecha_de_caducidad", type="date")
     */
    private $fechaDeCaducidad;
    
    /**
     * @ORM\Column(name="cumple_con_fecha_de_caducidad", type="boolean")
     */
    private $cumpleConFechaDeCaducidad;
   

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
     * @param \Saba\FarmaciaBundle\Entity\EntradaPorDonacion $nea
     * @return MovimientoDeOtrasEntradas
     */
    public function setNea(\Saba\FarmaciaBundle\Entity\EntradaPorDonacion $nea = null)
    {
        $this->nea = $nea;

        return $this;
    }

    /**
     * Get nea
     *
     * @return \Saba\FarmaciaBundle\Entity\EntradaPorDonacion 
     */
    public function getNea()
    {
        return $this->nea;
    }

    /**
     * Set fechaDeCaducidad
     *
     * @param \DateTime $fechaDeCaducidad
     * @return MovimientoDeOtrasEntradas
     */
    public function setFechaDeCaducidad($fechaDeCaducidad)
    {
        $this->fechaDeCaducidad = $fechaDeCaducidad;

        return $this;
    }

    /**
     * Get fechaDeCaducidad
     *
     * @return \DateTime 
     */
    public function getFechaDeCaducidad()
    {
        return $this->fechaDeCaducidad;
    }

    /**
     * Set cumpleConFechaDeCaducidad
     *
     * @param boolean $cumpleConFechaDeCaducidad
     * @return MovimientoDeOtrasEntradas
     */
    public function setCumpleConFechaDeCaducidad($cumpleConFechaDeCaducidad)
    {
        $this->cumpleConFechaDeCaducidad = $cumpleConFechaDeCaducidad;

        return $this;
    }

    /**
     * Get cumpleConFechaDeCaducidad
     *
     * @return boolean 
     */
    public function getCumpleConFechaDeCaducidad()
    {
        return $this->cumpleConFechaDeCaducidad;
    }

    /**
     * Set otrasEntradas
     *
     * @param \Saba\FarmaciaBundle\Entity\OtrasEntradas $otrasEntradas
     * @return MovimientoDeOtrasEntradas
     */
    public function setOtrasEntradas(\Saba\FarmaciaBundle\Entity\OtrasEntradas $otrasEntradas = null)
    {
        $this->otrasEntradas = $otrasEntradas;

        return $this;
    }

    /**
     * Get otrasEntradas
     *
     * @return \Saba\FarmaciaBundle\Entity\OtrasEntradas 
     */
    public function getOtrasEntradas()
    {
        return $this->otrasEntradas;
    }
}
