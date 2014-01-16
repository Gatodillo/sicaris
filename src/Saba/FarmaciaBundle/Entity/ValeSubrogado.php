<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vale_subrogado")
 * @ORM\HasLifecycleCallbacks
 */
class ValeSubrogado {
    
        
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * 
     * @ORM\Column(type="integer", unique=true)
     */
    protected $folio;    
    
    /**
     * 
     * @ORM\OneToOne(targetEntity="Receta")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $recetaOrigen;
    
    /**
     * @ORM\ManyToOne(targetEntity="Medico")
     * @ORM\JoinColumn(unique=false)
     */
    protected $medico;
    
    /**
     * @ORM\ManyToOne(targetEntity="Paciente")
     * @ORM\JoinColumn(unique=false)
     */
    protected $paciente;
    
    /**
     * @ORM\OneToMany(targetEntity="ValeSubrogadoTieneLineas", mappedBy="valeSubrogado",cascade={"persist"})
     */
    protected $lineasDeValeSubrogado;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lineasDeValeSubrogado = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set folio
     *
     * @param integer $folio
     * @return ValeSubrogado
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;

        return $this;
    }

    /**
     * Get folio
     *
     * @return integer 
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Set recetaOrigen
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $recetaOrigen
     * @return ValeSubrogado
     */
    public function setRecetaOrigen(\Saba\FarmaciaBundle\Entity\Receta $recetaOrigen = null)
    {
        $this->recetaOrigen = $recetaOrigen;

        return $this;
    }

    /**
     * Get recetaOrigen
     *
     * @return \Saba\FarmaciaBundle\Entity\Receta 
     */
    public function getRecetaOrigen()
    {
        return $this->recetaOrigen;
    }

    /**
     * Set medico
     *
     * @param \Saba\FarmaciaBundle\Entity\Medico $medico
     * @return ValeSubrogado
     */
    public function setMedico(\Saba\FarmaciaBundle\Entity\Medico $medico = null)
    {
        $this->medico = $medico;

        return $this;
    }

    /**
     * Get medico
     *
     * @return \Saba\FarmaciaBundle\Entity\Medico 
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Set paciente
     *
     * @param \Saba\FarmaciaBundle\Entity\Paciente $paciente
     * @return ValeSubrogado
     */
    public function setPaciente(\Saba\FarmaciaBundle\Entity\Paciente $paciente = null)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get paciente
     *
     * @return \Saba\FarmaciaBundle\Entity\Paciente 
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Add lineasDeValeSubrogado
     *
     * @param \Saba\FarmaciaBundle\Entity\ValeSubrogadoTieneLineas $lineasDeValeSubrogado
     * @return ValeSubrogado
     */
    public function addLineasDeValeSubrogado(\Saba\FarmaciaBundle\Entity\ValeSubrogadoTieneLineas $lineasDeValeSubrogado)
    {
        $lineasDeValeSubrogado->setValeSubrogado($this);
        $this->lineasDeValeSubrogado[] = $lineasDeValeSubrogado;

        return $this;
    }

    /**
     * Remove lineasDeValeSubrogado
     *
     * @param \Saba\FarmaciaBundle\Entity\ValeSubrogadoTieneLineas $lineasDeValeSubrogado
     */
    public function removeLineasDeValeSubrogado(\Saba\FarmaciaBundle\Entity\ValeSubrogadoTieneLineas $lineasDeValeSubrogado)
    {
        $this->lineasDeValeSubrogado->removeElement($lineasDeValeSubrogado);
    }

    /**
     * Get lineasDeValeSubrogado
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLineasDeValeSubrogado()
    {
        return $this->lineasDeValeSubrogado;
    }
    
    /**
     * Get lineasDeValeSubrogado
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function setLineasDeValeSubrogado(\Doctrine\Common\Collections\ArrayCollection $lineas)
    {
        $this->addLineasDeValeSubrogado($linea);
        return $this;
    }
    
    public function __toString() {
        return $this->getFolio() ?: "";
    }
    
    
    /**
     * @ORM\PrePersist
     */
    public function prePersist(){
        print $this->getFolio();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(){
        print $this->getFolio();
    }    
}
