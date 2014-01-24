<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase CentroDeCostosAdmin
 * CentroDeCostos
 *
 * @ORM\Table(name="centros_de_costos")
 * @ORM\Entity
 */
class CentroDeCostos
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
     * @ORM\Column(type="string")
     */
    private $clave;
    
    /**
     * @ORM\Column(type="string")
     */
    private $descripcion;
    
    /**
     * @ORM\ManytoOne(targetEntity="UnidadResponsableDeCentrosdeCostos")
     */
    private $unidadResponsable;
    
    /**
     * TODO: Obtener la especificación para este atributo.
     * @ORM\Column(type="string")
     */
    private $titular;
    
    /**
     * @ORM\ManyToOne(targetEntity="RutaDereparto")
     */
    private $rutaDeReparto;
    

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
     * @return CentroDeCostos
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
     * @return CentroDeCostos
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
     * Set titular
     *
     * @param string $titular
     * @return CentroDeCostos
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
     * Set unidadResponsable
     *
     * @param \Saba\FarmaciaBundle\Entity\UnidadResponsableDeCentrosdeCostos $unidadResponsable
     * @return CentroDeCostos
     */
    public function setUnidadResponsable(\Saba\FarmaciaBundle\Entity\UnidadResponsableDeCentrosdeCostos $unidadResponsable = null)
    {
        $this->unidadResponsable = $unidadResponsable;

        return $this;
    }

    /**
     * Get unidadResponsable
     *
     * @return \Saba\FarmaciaBundle\Entity\UnidadResponsableDeCentrosdeCostos 
     */
    public function getUnidadResponsable()
    {
        return $this->unidadResponsable;
    }

    /**
     * Set rutaDeReparto
     *
     * @param \Saba\FarmaciaBundle\Entity\RutaDereparto $rutaDeReparto
     * @return CentroDeCostos
     */
    public function setRutaDeReparto(\Saba\FarmaciaBundle\Entity\RutaDereparto $rutaDeReparto = null)
    {
        $this->rutaDeReparto = $rutaDeReparto;

        return $this;
    }

    /**
     * Get rutaDeReparto
     *
     * @return \Saba\FarmaciaBundle\Entity\RutaDereparto 
     */
    public function getRutaDeReparto()
    {
        return $this->rutaDeReparto;
    }
}
