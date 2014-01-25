<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase EspecialidadAdmin
 * Especialidad
 *
 * @ORM\Table(name="especialidades")
 * @ORM\Entity
 */
class Especialidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="clave", type="string", length=50)
     */
    protected $clave;
    
    /**
     * @ORM\Column(name="descripcion", type="string")
     */
    protected $descripcion;
    
    /**
     * @ORM\Column(name="esta_activo", type="boolean",nullable=true)
     */
    protected $estaActivo; 
    

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
     * Set clave
     *
     * @param string $clave
     * @return Especialidad
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Especialidad
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set estaActivo
     *
     * @param boolean $estaActivo
     * @return Especialidad
     */
    public function setEstaActivo($estaActivo)
    {
        $this->estaActivo = $estaActivo;

        return $this;
    }

    /**
     * Get estaActivo
     *
     * @return boolean 
     */
    public function getEstaActivo()
    {
        return $this->estaActivo;
    }
    
    public function __toString() {
        return $this->getClave() ?: "";
    }
}
