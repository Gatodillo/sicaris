<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase DependenciaAdmin
 * Dependencia
 *
 * @ORM\Table(name="dependencias")
 * @ORM\Entity
 */
class Dependencia
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
     * TODO: Validar la especificación de este campo.
     * @ORM\Column(type="integer")
     */
    private $clave;

    /**
     * @ORM\Column(type="string")
     */
    private $titular;
    
    /**
     * @ORM\Column(type="string")
     */
    private $descripcion;

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
     * @param integer $clave
     * @return Dependencia
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return integer 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set titular
     *
     * @param string $titular
     * @return Dependencia
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;

        return $this;
    }

    /**
     * Get titular
     *
     * @return string 
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Dependencia
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
    
    public function __toString() {
        return (string)$this->getClave() . " " . $this->getTitular()
                . " " . $this->getDescripcion();
    }
}
