<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of EntradaPorDonacion
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Table(name="entradas_por_donacion")
 * @ORM\Entity
 */
class EntradaPorDonacion {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $nea;
    
    /**
     * @ORM\ManyToOne(targetEntity="OficioPorDonacion")
     * @ORM\JoinColumn(name="oficio_por_donacion_id")
     */
    protected $oficio;
    
    /**
     * @ORM\OneToMany(targetEntity="MovimientoDeEntradaPorDonacion", mappedBy="nea")
     */
    protected $movimientos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return (string)$this->getNea() ?: "";
    }

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
     * @param integer $nea
     * @return EntradaPorDonacion
     */
    public function setNea($nea)
    {
        $this->nea = $nea;

        return $this;
    }

    /**
     * Get nea
     *
     * @return integer 
     */
    public function getNea()
    {
        return $this->nea;
    }

    /**
     * Set oficio
     *
     * @param \Saba\FarmaciaBundle\Entity\OficioPorDonacion $oficio
     * @return EntradaPorDonacion
     */
    public function setOficio(\Saba\FarmaciaBundle\Entity\OficioPorDonacion $oficio = null)
    {
        $this->oficio = $oficio;

        return $this;
    }

    /**
     * Get oficio
     *
     * @return \Saba\FarmaciaBundle\Entity\OficioPorDonacion 
     */
    public function getOficio()
    {
        return $this->oficio;
    }

    /**
     * Add movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorDonacion $movimientos
     * @return EntradaPorDonacion
     */
    public function addMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorDonacion $movimientos)
    {
        $this->movimientos[] = $movimientos;

        return $this;
    }

    /**
     * Remove movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorDonacion $movimientos
     */
    public function removeMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorDonacion $movimientos)
    {
        $this->movimientos->removeElement($movimientos);
    }

    /**
     * Get movimientos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovimientos()
    {
        return $this->movimientos;
    }
}
