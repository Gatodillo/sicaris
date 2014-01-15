<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Paciente
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity
 * @ORM\Table(name="pacientes")
 */
class Paciente {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *
     * @ORM\Column(type="integer", unique=True)
     */    
    protected $numeroDeAfiliacion;
    
    /**
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $apellidoPaterno;
    
    /**
     * 
     * @ORM\Column(type="string", length=50)
     */
    protected $apellidoMaterno;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $nombresDePila;

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
     * Set numeroDeAfiliacion
     *
     * @param integer $numeroDeAfiliacion
     * @return Paciente
     */
    public function setNumeroDeAfiliacion($numeroDeAfiliacion)
    {
        $this->numeroDeAfiliacion = $numeroDeAfiliacion;

        return $this;
    }

    /**
     * Get numeroDeAfiliacion
     *
     * @return integer 
     */
    public function getNumeroDeAfiliacion()
    {
        return $this->numeroDeAfiliacion;
    }

    /**
     * Set apellidoPaterno
     *
     * @param string $apellidoPaterno
     * @return Paciente
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
     * @return Paciente
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
     * @return Paciente
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
    
     public function __toString() {
        return $this->getNumeroDeAfiliacion() . ". " . $this->getApellidoPaterno()
                . " " . $this ->getApellidoMaterno()
                . ", " . $this->getNombresDePila();
    }
}
