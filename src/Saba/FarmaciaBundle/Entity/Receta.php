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
 * @ORM\Table(name="recetas")
 * @ORM\HasLifecycleCallbacks
 */
class Receta {
    
        
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
     * @ORM\ManyToOne(targetEntity="Receta", inversedBy="recetasHijas")
     * @ORM\JoinColumn(name="receta_padre_id", referencedColumnName="id", nullable=true)
     */
    protected $recetaPadre;
    
    /**
     * @ORM\OneToMany(targetEntity="Receta", mappedBy="recetaPadre")
     */
    protected $subrecetas;
    
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
     * @ORM\OneToMany(targetEntity="LineaDeReceta", mappedBy="receta", cascade={"persist"}, orphanRemoval=true)
     */
    protected $lineasDeReceta;

    /**
     * @ORM\OneToOne(targetEntity="ValeSubrogado", cascade={"all"})
     * @ORM\JoinColumn(name="vale_subrogado_id", nullable=true)
     */
    protected $valeSubrogado;

    
    /**
     * @ORM\ManyToOne(targetEntity="EstadoDeReceta", cascade={ "persist"})
     */
    protected $estado;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoDeReceta", cascade={ "persist"})
     * @ORM\JoinColumn(name="tipo_de_receta_id")
     */
    protected $tipoDeReceta;
    
    /**
     * @ORM\ManyToOne(targetEntity="CentroDeCostos", cascade={ "persist"})
     * @ORM\JoinColumn(name="centro_de_costos_id")
     */
    protected $centroDeCostos;
    
    /*
     * Si $medicamento == null entonces return false, porque se está intentando 
     * dar salida a un artículo que no es un medicamento.
     * 
     * Si $receta no contiene $medicamento entonces return false.
     */
    public function tieneMedicamento($medicamento){
        if (null == $medicamento) return false;
        foreach ($this->getLineasDeReceta() as $linea){
            $medicamentoEnReceta = $linea->getMedicamento();
            if ($medicamentoEnReceta->getId() == $medicamento->getId()){
                return true;
            }
        }
        return false;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subrecetas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lineasDeReceta = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return Receta
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * @return Receta
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
     * Set recetaPadre
     *
     * @param integer $recetaPadre
     * @return Receta
     */
    public function setRecetaPadre($recetaPadre)
    {
        $this->recetaPadre = $recetaPadre;

        return $this;
    }

    /**
     * Get recetaPadre
     *
     * @return integer 
     */
    public function getRecetaPadre()
    {
        return $this->recetaPadre;
    }

    /**
     * Add recetasHijas
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $recetasHijas
     * @return Receta
     */
    public function addSubreceta(\Saba\FarmaciaBundle\Entity\Receta $recetasHija)
    {
        $this->subrecetas[] = $recetasHija;

        return $this;
    }

    /**
     * Remove recetasHijas
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $recetasHijas
     */
    public function removeSubreceta(\Saba\FarmaciaBundle\Entity\Receta $recetasHija)
    {
        $this->subrecetas->removeElement($recetasHija);
    }

    /**
     * Get subrecetas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubrecetas()
    {
        return $this->subrecetas;
    }

    /**
     * Set medico
     *
     * @param \Saba\FarmaciaBundle\Entity\Medico $medico
     * @return Receta
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
     * @return Receta
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


    public function addLineasDeReceta($lineaDeReceta)
    {
        $lineaDeReceta->setReceta($this);
        $this->lineasDeReceta[] = $lineaDeReceta;
    }

    
    public function addLineasDeRecetum($lineaDeReceta)
    {
        $lineaDeReceta->setReceta($this);
        $this->lineasDeReceta[] = $lineaDeReceta;
    }
    
    /**
     * Remove lineasDeReceta
     *
     * @param \Saba\FarmaciaBundle\Entity\RecetaTieneLineas $lineasDeReceta
     */
    public function removeLineasDeRecetum(LineaDeReceta $lineasDeReceta)
    {
        $this->lineasDeReceta->removeElement($lineasDeReceta);
    }

    /**
     * Get lineasDeReceta
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLineasDeReceta()
    {
        return $this->lineasDeReceta;
    }
    
    public function setLineasDeReceta($lineasDeReceta){
        //$this->lineasDeReceta = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lineasDeReceta = $lineasDeReceta;
        /*foreach($lineasDeReceta as $linea){
            $this->addLineasDeRecetum($linea);
        }*/
        
        return $this;
    }
    
    public function __toString() {
        return (string)($this->getFolio());
    }

    /**
     * Set valeSubrogado
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $valeSubrogado
     * @return Receta
     */
    public function setValeSubrogado(\Saba\FarmaciaBundle\Entity\ValeSubrogado $valeSubrogado = null)
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
     * @ORM\PrePersist
     */
    public function prePersist(){
        //print $this->getValeSubrogado()->getFolio();
        //$this->setEstado(new EstadoDeReceta())->getEstado()->setId(1);
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(){
        //print $this->getValeSubrogado()->getFolio();
    }


    /**
     * Set estado
     *
     * @param \Saba\FarmaciaBundle\Entity\EstadoDeReceta $estado
     * @return Receta
     */
    public function setEstado(\Saba\FarmaciaBundle\Entity\EstadoDeReceta $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \Saba\FarmaciaBundle\Entity\EstadoDeReceta 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set tipoDeReceta
     *
     * @param \Saba\FarmaciaBundle\Entity\TipoDeReceta $tipoDeReceta
     * @return Receta
     */
    public function setTipoDeReceta(\Saba\FarmaciaBundle\Entity\TipoDeReceta $tipoDeReceta = null)
    {
        $this->tipoDeReceta = $tipoDeReceta;

        return $this;
    }

    /**
     * Get tipoDeReceta
     *
     * @return \Saba\FarmaciaBundle\Entity\TipoDeReceta 
     */
    public function getTipoDeReceta()
    {
        return $this->tipoDeReceta;
    }

    /**
     * Set centroDeCostos
     *
     * @param \Saba\FarmaciaBundle\Entity\CentroDeCostos $centroDeCostos
     * @return Receta
     */
    public function setCentroDeCostos(\Saba\FarmaciaBundle\Entity\CentroDeCostos $centroDeCostos = null)
    {
        $this->centroDeCostos = $centroDeCostos;

        return $this;
    }

    /**
     * Get centroDeCostos
     *
     * @return \Saba\FarmaciaBundle\Entity\CentroDeCostos 
     */
    public function getCentroDeCostos()
    {
        return $this->centroDeCostos;
    }
}
