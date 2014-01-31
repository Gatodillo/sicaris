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
     * @ORM\Column(name="receta_origen_id");
     */
    protected $receta;
    
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
     * @ORM\OneToMany(targetEntity="LineaDeValeSubrogado", mappedBy="valeSubrogado",cascade={"persist", "remove"})
     */
    protected $lineas;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lineas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set receta
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $receta
     * @return ValeSubrogado
     */
    public function setReceta($receta = null)
    {
        $this->receta = $receta;

        return $this;
    }

    /**
     * Get receta
     *
     * @return \Saba\FarmaciaBundle\Entity\Receta 
     */
    public function getReceta()
    {
        return $this->receta;
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




    
    public function __toString() {
        return (string)$this->getFolio() ?: "";
    }
   

    /**
     * Add lineas
     *
     * @param \Saba\FarmaciaBundle\Entity\LineaDeValeSubrogado $lineas
     * @return ValeSubrogado
     */
    public function addLinea(\Saba\FarmaciaBundle\Entity\LineaDeValeSubrogado $lineas)
    {
        $lineas->setValeSubrogado($this);
        $this->lineas[] = $lineas;

        return $this;
    }

    /**
     * Remove lineas
     *
     * @param \Saba\FarmaciaBundle\Entity\LineaDeValeSubrogado $lineas
     */
    public function removeLinea(\Saba\FarmaciaBundle\Entity\LineaDeValeSubrogado $lineas)
    {
        $this->lineas->removeElement($lineas);
    }

    /**
     * Get lineas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLineas()
    {
        return $this->lineas;
    }
}
