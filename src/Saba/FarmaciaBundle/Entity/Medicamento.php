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
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * TODO: Crear la entidad Subfamilia y relacionarlas
     * @ORM\ManyToOne(targetEntity="Familia")
     */
    protected $subfamilia;
    
    /**
     * TODO: Crear la entidad Grupo y relacionarlas
     * @ORM\ManyToOne(targetEntity="GrupoDeMedicamento")
     */
    protected $grupo;
    
    /**
     * TODO: Crear la entidad Espacialidad y relacionarlas
     * @ORM\ManyToOne(targetEntity="Especialidad")
     */
    protected $especialidad;    
    
    /**
     * ORM\OneToMany(targetentity="VariacionesDeMedicamento", mappedBy="medicamento")
     */
    protected $variaciones;

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
    
    public function __toString() {
        return $this->getNombreGenerico() ?: "";
    }


}
