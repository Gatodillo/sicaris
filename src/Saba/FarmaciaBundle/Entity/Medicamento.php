<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Medicamento
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity
 * @ORM\Table(name="medicamento")
 */
class Medicamento {
    
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $nombreGenerico;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $descripcion;

    /**
     * TODO: Crear la entidad Subfamilia y relacionarlas
     * @ORM\ManyToOne(targetEntity="Subfamilia")
     */
    protected $subfamilia;
    
    /**
     * TODO: Crear la entidad Grupo y relacionarlas
     * @ORM\ManyToOne(targetEntity="Grupo")
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
     * Set nombre
     *
     * @param string $nombre
     * @return Medicamento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set codigoDeBarras
     *
     * @param string $codigoDeBarras
     * @return Medicamento
     */
    public function setCodigoDeBarras($codigoDeBarras)
    {
        $this->codigoDeBarras = $codigoDeBarras;

        return $this;
    }

    /**
     * Get codigoDeBarras
     *
     * @return string 
     */
    public function getCodigoDeBarras()
    {
        return $this->codigoDeBarras;
    }
    
    public function __toString(){
        return $this->codigoDeBarras;
    }
}
