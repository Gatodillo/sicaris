<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articulo
 *
 * @ORM\Table(name="articulos")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discriminador", type="string")
 * @ORM\DiscriminatorMap({"articulo" = "Articulo", "medicamento"="Medicamento"})
 * @ORM\Entity
 */
class Articulo
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
     *
     * @ORM\Column(name="nombre_generico", type="string", length=50)
     */
    private $nombreGenerico;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    private $descripcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadDeMedida")
     * @ORM\JoinColumn(name="unidad_de_medida_id")
     */
    private $unidadDeMedida;

    /**
     * @ORM\Column(type="string", name="codigo_de_barras")
     */
    private $codigoDeBarras;
    

    /**
     * @ORM\Column(name="esta_activo", type="boolean")
     */
    private $estaActivo;
    
    /**
     * Set nombreGenerico
     *
     * @param string $nombreGenerico
     * @return Articulo
     */
    public function setNombreGenerico($nombreGenerico)
    {
        $this->nombreGenerico = $nombreGenerico;

        return $this;
    }

    /**
     * Get nombreGenerico
     *
     * @return string 
     */
    public function getNombreGenerico()
    {
        return $this->nombreGenerico;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Articulo
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
     * Set unidadDeMedida
     *
     * @param string $unidadDeMedida
     * @return Articulo
     */
    public function setUnidadDeMedida($unidadDeMedida)
    {
        $this->unidadDeMedida = $unidadDeMedida;

        return $this;
    }

    /**
     * Get unidadDeMedida
     *
     * @return string 
     */
    public function getUnidadDeMedida()
    {
        return $this->unidadDeMedida;
    }

    /**
     * Set codigoDeBarras
     *
     * @param string $codigoDeBarras
     * @return Articulo
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
     * Set estaActivo
     *
     * @param boolean $estaActivo
     * @return Articulo
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
}
