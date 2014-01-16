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
    protected $recetasHijas;
    
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
     * @ORM\OneToMany(targetEntity="RecetaTieneLineas", mappedBy="receta",cascade={"persist"})
     */
    protected $lineasDeReceta;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recetasHijas = new \Doctrine\Common\Collections\ArrayCollection();
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
    public function addRecetasHija(\Saba\FarmaciaBundle\Entity\Receta $recetasHijas)
    {
        $this->recetasHijas[] = $recetasHijas;

        return $this;
    }

    /**
     * Remove recetasHijas
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $recetasHijas
     */
    public function removeRecetasHija(\Saba\FarmaciaBundle\Entity\Receta $recetasHijas)
    {
        $this->recetasHijas->removeElement($recetasHijas);
    }

    /**
     * Get recetasHijas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecetasHijas()
    {
        return $this->recetasHijas;
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

    /**
     * Add lineasDeReceta
     *
     * @param \Saba\FarmaciaBundle\Entity\RecetaTieneLineas $lineasDeReceta
     * @return Receta
     */
    public function addLineasDeRecetum(\Saba\FarmaciaBundle\Entity\RecetaTieneLineas $lineaDeReceta)
    {
        $lineaDeReceta->setReceta($this);
        $this->lineasDeReceta[] = $lineaDeReceta;

        return $this;
    }
    
    
    public function addLineasDeReceta($lineaDeReceta)
    {
        $lineaDeReceta->setReceta($this);
        $this->lineasDeReceta[] = $lineaDeReceta;

    }
    
    /**
     * Remove lineasDeReceta
     *
     * @param \Saba\FarmaciaBundle\Entity\RecetaTieneLineas $lineasDeReceta
     */
    public function removeLineasDeRecetum(\Saba\FarmaciaBundle\Entity\RecetaTieneLineas $lineasDeReceta)
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
        $this->lineasDeReceta = new \Doctrine\Common\Collections\ArrayCollection();
        
        foreach($lineasDeReceta as $linea){
            $this->addLineasDeReceta($linea);
        }
        
        return $this;
    }
    
    public function __toString() {
        return (string)($this->getFolio());
    }
}
