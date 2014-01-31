<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase MedicamentoAdmin.
 * Description of Medicamento
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity
 * @ORM\Table(name="medicamentos",
 *  uniqueConstraints={@ORM\UniqueConstraint(name="unique_medicamento",
 *  columns={"nombre_generico","concentracion","forma_farmaceutica_id"})})
 */
class Medicamento{
    
    /**
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
    /**
     *
     * @ORM\Column(name="nombre_generico")
     */
    private $nombreGenerico;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    private $concentracion;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="FormaFarmaceutica")
     * @ORM\JoinColumn(name="forma_farmaceutica_id")
     */
    private $formaFarmaceutica;
    
   /**
     * 
     * @ORM\ManyToOne(targetEntity="Familia", cascade={"persist"})
     */
    private $subfamilia;
    
    /**
     * @ORM\ManyToOne(targetEntity="GrupoDeMedicamento", cascade={"persist"})
     */
    private $grupo;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Especialidad", cascade={"persist"})
     */
    private $especialidad;
    
    /**
     * 
     * @ORM\Column(type="string")
     */
    private $nivel;
    
    /**
     *
     * @ORM\Column(nullable=true)
     */
    private $indicaciones;
    /**
     *
     * @ORM\OneToMany(targetEntity="Articulo", mappedBy="medicamento", cascade={"all"}); 
     */
    private $nombresComerciales;
    
    
    
    public function __toString() {
        return ($this->getNombreGenerico() . " " . $this->getConcentracion() 
                . " " . $this->getFormaFarmaceutica())?: "";
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nombresComerciales = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombreGenerico
     *
     * @param string $nombreGenerico
     * @return Medicamento
     */
    public function setNombreGenerico($nombreGenerico)
    {
        $this->nombreGenerico = $nombreGenerico;

        return $this;
    }

    /**
     * Get nombreGenerico
     *
     * @return string 
     */
    public function getNombreGenerico()
    {
        return $this->nombreGenerico;
    }

    /**
     * Set concentracion
     *
     * @param string $concentracion
     * @return Medicamento
     */
    public function setConcentracion($concentracion)
    {
        $this->concentracion = $concentracion;

        return $this;
    }

    /**
     * Get concentracion
     *
     * @return string 
     */
    public function getConcentracion()
    {
        return $this->concentracion;
    }

    /**
     * Set formaFarmaceutica
     *
     * @param \Saba\FarmaciaBundle\Entity\FormaFarmaceutica $formaFarmaceutica
     * @return Medicamento
     */
    public function setFormaFarmaceutica(\Saba\FarmaciaBundle\Entity\FormaFarmaceutica $formaFarmaceutica = null)
    {
        $this->formaFarmaceutica = $formaFarmaceutica;

        return $this;
    }

    /**
     * Get formaFarmaceutica
     *
     * @return \Saba\FarmaciaBundle\Entity\FormaFarmaceutica 
     */
    public function getFormaFarmaceutica()
    {
        return $this->formaFarmaceutica;
    }

    /**
     * Set subfamilia
     *
     * @param \Saba\FarmaciaBundle\Entity\Familia $subfamilia
     * @return Medicamento
     */
    public function setSubfamilia(\Saba\FarmaciaBundle\Entity\Familia $subfamilia = null)
    {
        $this->subfamilia = $subfamilia;

        return $this;
    }

    /**
     * Get subfamilia
     *
     * @return \Saba\FarmaciaBundle\Entity\Familia 
     */
    public function getSubfamilia()
    {
        return $this->subfamilia;
    }

    /**
     * Set grupo
     *
     * @param \Saba\FarmaciaBundle\Entity\GrupoDeMedicamento $grupo
     * @return Medicamento
     */
    public function setGrupo(\Saba\FarmaciaBundle\Entity\GrupoDeMedicamento $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \Saba\FarmaciaBundle\Entity\GrupoDeMedicamento 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set especialidad
     *
     * @param \Saba\FarmaciaBundle\Entity\Especialidad $especialidad
     * @return Medicamento
     */
    public function setEspecialidad(\Saba\FarmaciaBundle\Entity\Especialidad $especialidad = null)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * Get especialidad
     *
     * @return \Saba\FarmaciaBundle\Entity\Especialidad 
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Add nombresComerciales
     *
     * @param \Saba\FarmaciaBundle\Entity\Articulo $nombresComerciales
     * @return Medicamento
     */
    public function addNombresComerciale(\Saba\FarmaciaBundle\Entity\Articulo $nombresComerciales)
    {
        $nombresComerciales->setMedicamento($this);
        $this->nombresComerciales[] = $nombresComerciales;

        return $this;
    }

    /**
     * Remove nombresComerciales
     *
     * @param \Saba\FarmaciaBundle\Entity\Articulo $nombresComerciales
     */
    public function removeNombresComerciale(\Saba\FarmaciaBundle\Entity\Articulo $nombresComerciales)
    {
        $nombresComerciales->setMedicamento(null);
        $this->nombresComerciales->removeElement($nombresComerciales);
    }

    /**
     * Get nombresComerciales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNombresComerciales()
    {
        return $this->nombresComerciales;
    }

    /**
     * Set indicaciones
     *
     * @param string $indicaciones
     * @return Medicamento
     */
    public function setIndicaciones($indicaciones)
    {
        $this->indicaciones = $indicaciones;

        return $this;
    }

    /**
     * Get indicaciones
     *
     * @return string 
     */
    public function getIndicaciones()
    {
        return $this->indicaciones;
    }

    /**
     * Set nivel
     *
     * @param string $nivel
     * @return Medicamento
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string 
     */
    public function getNivel()
    {
        return $this->nivel;
    }
}
