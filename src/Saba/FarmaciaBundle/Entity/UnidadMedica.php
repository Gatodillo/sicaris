<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase CentroDeCostosAdmin
 * CentroDeCostos
 *
 * @ORM\Table(name="unidades_medicas")
 * @ORM\Entity
 */
class UnidadMedica
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
     * @ORM\Column(type="string", unique=true)
     */
    private $clave;
    
    /**
     * @ORM\Column(type="string")
     */
    private $descripcion;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tipo;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $region;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $clasificacion;    
    
    /**
     * @ORM\Column(type="integer")
     */
    private $nivel;    

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
     * @return UnidadMedica
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
     * @return UnidadMedica
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
     * Set tipo
     *
     * @param string $tipo
     * @return UnidadMedica
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return UnidadMedica
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set clasificacion
     *
     * @param string $clasificacion
     * @return UnidadMedica
     */
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return string 
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set nivel
     *
     * @param integer $nivel
     * @return UnidadMedica
     */
    public function setNivel( $nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer
     */
    public function getNivel()
    {
        return $this->nivel;
    }
    
    public function __toString() {
        return (string)$this->getNivel();
    }
}
