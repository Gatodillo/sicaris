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
 * @ORM\Table(name="medicamentos")
 */
class Medicamento extends Articulo {
    
    /**
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
 
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
     * @ORM\OneToMany(targetEntity="VarianteDeMedicamento", mappedBy="medicamento", cascade={"persist"})
     */
    private $variantes;

    
    public function __construct()
    {
        $this->variantes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param \Saba\FarmaciaBundle\Entity\UnidadDeMedida $grupo
     * @return Medicamento
     */
    public function setGrupo(\Saba\FarmaciaBundle\Entity\UnidadDeMedida $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \Saba\FarmaciaBundle\Entity\UnidadDeMedida 
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
    
    public function __toString() {
        return ($this->getNombreGenerico() . " " . $this->getCodigoDeBarras()) ?: "";
    }

    /**
     * Add variantes
     *
     * @param \Saba\FarmaciaBundle\Entity\VarianteDeMedicamento $variante
     * @return Medicamento
     */
    public function addVariante(\Saba\FarmaciaBundle\Entity\VarianteDeMedicamento $variante)
    {
        $variante->setMedicamento($this);
        $this->variantes[] = $variante;

        return $this;
    }

    /**
     * Remove variantes
     *
     * @param \Saba\FarmaciaBundle\Entity\VarianteDeMedicamento $variante
     */
    public function removeVariante(\Saba\FarmaciaBundle\Entity\VarianteDeMedicamento $variante)
    {
        $this->variantes->removeElement($variante);
    }

    /**
     * Get variantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVariantes()
    {
        return $this->variantes;
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

}
