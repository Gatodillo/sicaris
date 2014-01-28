<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear el clase UnidadResponsableDeCentrosDeCostosAdmin
 * UnidadMedica
 *
 * @ORM\Table(name="unidades_responsables_de_centros_de_costos")
 * @ORM\Entity
 */
class UnidadResponsableDeCentrosDeCostos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * TODO: Validar la especificación de este atributo.
     * Sustituye a "Unidad responsable".
     * @ORM\Column(type="string")
     */
    private $clave;
    
    /**
     * TODO: Validar la especificación de este campo.
     * @ORM\Column(type="string")
     */
    private $titular;
    
    /**
     * 
     * @ORM\Column(type="string")
     */
    private $descripcion;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Dependencia")
     */
    private $dependencia;    

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
     * @return UnidadResponsableDeCentrosDeCostos
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
     * Set titular
     *
     * @param string $titular
     * @return UnidadResponsableDeCentrosDeCostos
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
     * @return UnidadResponsableDeCentrosDeCostos
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
     * Set dependencia
     *
     * @param \Saba\FarmaciaBundle\Entity\Dependencia $dependencia
     * @return UnidadResponsableDeCentrosDeCostos
     */
    public function setDependencia(\Saba\FarmaciaBundle\Entity\Dependencia $dependencia = null)
    {
        $this->dependencia = $dependencia;

        return $this;
    }

    /**
     * Get dependencia
     *
     * @return \Saba\FarmaciaBundle\Entity\Dependencia 
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }
    
    public function __toString() {
        return $this->getClave() ?: "";
    }
}
