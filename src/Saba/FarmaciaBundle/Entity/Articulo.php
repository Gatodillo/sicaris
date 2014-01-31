<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articulo
 *
 * @ORM\Table(name="articulos")
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
     * @ORM\Column(name="nombre_comercial", type="string", length=50)
     */
    private $nombreComercial;

    /**
     *
     * @ORM\Column(name="codigo_de_barras", type="string", length=50,unique=true)
     */
    private $codigoDeBarras;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadDeMedida")
     * @ORM\JoinColumn(name="unidad_de_medida_id", nullable=true)
     */
    private $unidadDeMedida;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Medicamento", inversedBy="nombresComerciales");
     * @ORM\JoinColumn(nullable=true) 
     */
    private $medicamento;

    /**
     * @ORM\Column(name="esta_activo", type="boolean",nullable=true)
     */
    private $estaActivo;
    
    
    
    public function __toString() {
        return $this->getNombreComercial() . "  " . $this->getCodigoDeBarras() ?: "";
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

    /**
     * Set unidadDeMedida
     *
     * @param \Saba\FarmaciaBundle\Entity\UnidadDeMedida $unidadDeMedida
     * @return Articulo
     */
    public function setUnidadDeMedida(\Saba\FarmaciaBundle\Entity\UnidadDeMedida $unidadDeMedida = null)
    {
        $this->unidadDeMedida = $unidadDeMedida;

        return $this;
    }

    /**
     * Get unidadDeMedida
     *
     * @return \Saba\FarmaciaBundle\Entity\UnidadDeMedida 
     */
    public function getUnidadDeMedida()
    {
        return $this->unidadDeMedida;
    }

    /**
     * Set medicamento
     *
     * @param \Saba\FarmaciaBundle\Entity\Medicamento $medicamento
     * @return Articulo
     */
    public function setMedicamento(\Saba\FarmaciaBundle\Entity\Medicamento $medicamento = null)
    {
        $this->medicamento = $medicamento;

        return $this;
    }

    /**
     * Get medicamento
     *
     * @return \Saba\FarmaciaBundle\Entity\Medicamento 
     */
    public function getMedicamento()
    {
        return $this->medicamento;
    }
}
