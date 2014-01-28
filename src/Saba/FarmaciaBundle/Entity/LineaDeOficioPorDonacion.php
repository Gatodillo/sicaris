<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase LineaDeOficioPorDonacionAdmin
 * FacturadeProveedor
 *
 * @ORM\Table(name="lineas_de_oficio_por_donacion")
 * @ORM\Entity
 */
class LineaDeOficioPorDonacion
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
     * @ORM\ManyToOne(targetEntity="OficioPorDonacion", 
     *  inversedBy="lineas")
     */
    private $oficio;
    
    /**
     * @ORM\ManyToOne(targetEntity="Articulo")
     */
    private $articulo;

    /**
     * @ORM\Column(type="integer", length=5)
     */
    private $cantidad;

    /**
     * @ORM\ManyToOne(targetEntity="UnidadDeMedida")
     */
    private $unidad;

    /**
     * @ORM\Column(type="float")
     */
    private $precioUnitario;
    
    /**
     * @ORM\Column(type="float")
     */
    private $subtotal;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion")
     * @ORM\JoinColumn(name="ubicacion_destino")
     */
    private $ubicacionDestino;


 

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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return LineaDeOficioPorDonacion
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precioUnitario
     *
     * @param float $precioUnitario
     * @return LineaDeOficioPorDonacion
     */
    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    /**
     * Get precioUnitario
     *
     * @return float 
     */
    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    /**
     * Set subtotal
     *
     * @param float $subtotal
     * @return LineaDeOficioPorDonacion
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * Get subtotal
     *
     * @return float 
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * Set oficioDeDonacion
     *
     * @param \Saba\FarmaciaBundle\Entity\OficioPorDonacion $oficioDeDonacion
     * @return LineaDeOficioPorDonacion
     */
    public function setOficio(\Saba\FarmaciaBundle\Entity\OficioPorDonacion $oficioDeDonacion = null)
    {
        $this->oficioDeDonacion = $oficioDeDonacion;

        return $this;
    }

    /**
     * Get oficioDeDonacion
     *
     * @return \Saba\FarmaciaBundle\Entity\OficioPorDonacion 
     */
    public function getOficio()
    {
        return $this->oficioDeDonacion;
    }

    /**
     * Set articulo
     *
     * @param \Saba\FarmaciaBundle\Entity\Articulo $articulo
     * @return LineaDeOficioPorDonacion
     */
    public function setArticulo(\Saba\FarmaciaBundle\Entity\Articulo $articulo = null)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return \Saba\FarmaciaBundle\Entity\Articulo 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Set unidad
     *
     * @param \Saba\FarmaciaBundle\Entity\UnidadDeMedida $unidad
     * @return LineaDeOficioPorDonacion
     */
    public function setUnidad(\Saba\FarmaciaBundle\Entity\UnidadDeMedida $unidad = null)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get unidad
     *
     * @return \Saba\FarmaciaBundle\Entity\UnidadDeMedida 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set ubicacionDestino
     *
     * @param \Saba\FarmaciaBundle\Entity\Ubicacion $ubicacionDestino
     * @return LineaDeOficioPorDonacion
     */
    public function setUbicacionDestino(\Saba\FarmaciaBundle\Entity\Ubicacion $ubicacionDestino = null)
    {
        $this->ubicacionDestino = $ubicacionDestino;

        return $this;
    }

    /**
     * Get ubicacionDestino
     *
     * @return \Saba\FarmaciaBundle\Entity\Ubicacion 
     */
    public function getUbicacionDestino()
    {
        return $this->ubicacionDestino;
    }
}
