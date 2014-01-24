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
    private $id;

    /**
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $nombreGenerico;
    
    /**
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $nombreComercial;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    protected $descripcion;
    
    /**
     * TODO: Crear la entidad UnidadDeMedida y relacionarlas.
     * @ORM\Column(type="string")
     */
    protected $unidadDeMedida;

    /**
     * @ORM\Column(type="string")
     */
    protected $codigoDeBarras;
    
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
     * Set nombreComercial
     *
     * @param string $nombreComercial
     * @return Articulo
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;

        return $this;
    }

    /**
     * Get nombreComercial
     *
     * @return string 
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }
}
