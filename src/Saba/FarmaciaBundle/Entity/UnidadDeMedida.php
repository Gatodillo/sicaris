<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="unidades_de_medida")
 * @ORM\Entity
 */
class UnidadDeMedida
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
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    protected $nombre;
    
        /**
     * @ORM\Column(name="abreviacion", type="string", length=50)
     */
    protected $abreviacion;
    
    /**
     * @ORM\Column(name="esta_activa", type="boolean",nullable=true)
     */
    protected $estaActiva;        
            
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
     * Set estaActiva
     *
     * @param boolean $estaActiva
     * @return UnidadDeMedida
     */
    public function setEstaActiva($estaActiva)
    {
        $this->estaActiva = $estaActiva;

        return $this;
    }

    /**
     * Get estaActiva
     *
     * @return boolean 
     */
    public function getEstaActiva()
    {
        return $this->estaActiva;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return UnidadDeMedida
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
     * Set abreviacion
     *
     * @param string $abreviacion
     * @return UnidadDeMedida
     */
    public function setAbreviacion($abreviacion)
    {
        $this->abreviacion = $abreviacion;

        return $this;
    }

    /**
     * Get abreviacion
     *
     * @return string 
     */
    public function getAbreviacion()
    {
        return $this->abreviacion;
    }
    
    public function __toString() {
        return $this->getAbreviacion() ?: "";
    }
}
