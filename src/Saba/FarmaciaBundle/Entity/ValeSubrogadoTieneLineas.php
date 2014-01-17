<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of ValesubrogadoTieneLineas
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity
 * @ORM\Table(name="vale_subrogado_tiene_lineas");
 */
class ValeSubrogadoTieneLineas {
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="ValeSubrogado", inversedBy="lineasDeValeSubrogado")
     * @ORM\JoinColumn(name="vale_subrogado_id", referencedColumnName="id", nullable=false)
     */    
    protected $valeSubrogado;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="LineaDeValeSubrogado", cascade={"persist"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="linea_de_vale_subrogado_id", referencedColumnName="id", unique=true)
     */    
    protected $lineaDeValeSubrogado; 

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
     * Set valeSubrogado
     *
     * @param \Saba\FarmaciaBundle\Entity\ValeSubrogado $valeSubrogado
     * @return ValeSubrogadoTieneLineas
     */
    public function setValeSubrogado(\Saba\FarmaciaBundle\Entity\ValeSubrogado $valeSubrogado)
    {
        $this->valeSubrogado = $valeSubrogado;

        return $this;
    }

    /**
     * Get valeSubrogado
     *
     * @return \Saba\FarmaciaBundle\Entity\ValeSubrogado 
     */
    public function getValeSubrogado()
    {
        return $this->valeSubrogado;
    }

    /**
     * Set lineaDeValeSubrogado
     *
     * @param \Saba\FarmaciaBundle\Entity\LineaDeValeSubrogado $lineaDeValeSubrogado
     * @return ValeSubrogadoTieneLineas
     */
    public function setLineaDeValeSubrogado(\Saba\FarmaciaBundle\Entity\LineaDeValeSubrogado $lineaDeValeSubrogado = null)
    {
        $this->lineaDeValeSubrogado = $lineaDeValeSubrogado;

        return $this;
    }

    /**
     * Get lineaDeValeSubrogado
     *
     * @return \Saba\FarmaciaBundle\Entity\LineaDeValeSubrogado 
     */
    public function getLineaDeValeSubrogado()
    {
        return $this->lineaDeValeSubrogado;
    }
}
