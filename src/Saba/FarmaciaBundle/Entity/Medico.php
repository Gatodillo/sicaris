<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM; 

/**
 * Description of Medico
 * 
 * @author victor
 * @ORM\Entity
 * @ORM\Table(name="medicos")
 * @IgnoreAnnotation("author")
 */
class Medico {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO");
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=25, unique=true);
     */
    protected $cedula;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $apellidoPaterno;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $apellidoMaterno;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $nombresDePila;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $centroDeCostos;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $especialidad;
    

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
     * Set cedula
     *
     * @param string $cedula
     * @return Medico
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set apellidoPaterno
     *
     * @param string $apellidoPaterno
     * @return Medico
     */
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;

        return $this;
    }

    /**
     * Get apellidoPaterno
     *
     * @return string 
     */
    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    /**
     * Set apellidoMaterno
     *
     * @param string $apellidoMaterno
     * @return Medico
     */
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;

        return $this;
    }

    /**
     * Get apellidoMaterno
     *
     * @return string 
     */
    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }

    /**
     * Set nombresDePila
     *
     * @param string $nombresDePila
     * @return Medico
     */
    public function setNombresDePila($nombresDePila)
    {
        $this->nombresDePila = $nombresDePila;

        return $this;
    }

    /**
     * Get nombresDePila
     *
     * @return string 
     */
    public function getNombresDePila()
    {
        return $this->nombresDePila;
    }

    /**
     * Set centroDeCosto
     *
     * @param string $centroDeCosto
     * @return Medico
     */
    public function setCentroDeCostos($centroDeCostos)
    {
        $this->centroDeCostos = $centroDeCostos;

        return $this;
    }

    /**
     * Get centroDeCosto
     *
     * @return string 
     */
    public function getCentroDeCostos()
    {
        return $this->centroDeCostos;
    }

    /**
     * Set especialidad
     *
     * @param string $especialidad
     * @return Medico
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * Get especialidad
     *
     * @return string 
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }
    
    public function __toString() {
        return $this->getCedula() . ". " . $this->getApellidoPaterno()
                . " " . $this ->getApellidoMaterno()
                . ", " . $this->getNombresDePila();
    }
}
