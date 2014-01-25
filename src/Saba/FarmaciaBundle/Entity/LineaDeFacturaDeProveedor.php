<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase LineasDeFacturaDeProveedorAdmin
 * FacturadeProveedor
 *
 * @ORM\Table(name="lineas_de_factura_de_proveedor")
 * @ORM\Entity
 */
class LineaDeFacturaDeProveedor
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
     * @ORM\ManyToOne(targetEntity="FacturaDeProveedor", 
     *  inversedBy="lineas")
     */
    private $factura;
    
    /**
     * @ORM\ManyToOne(targetEntity="Articulo")
     */
    private $articulo;

    /**
     * @ORM\Column(type="integer")
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
     * @return LineaDeFacturaDeProveedor
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
     * @return LineaDeFacturaDeProveedor
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
     * @return LineaDeFacturaDeProveedor
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
     * Set factura
     *
     * @param \Saba\FarmaciaBundle\Entity\FacturaDeProveedor $factura
     * @return LineaDeFacturaDeProveedor
     */
    public function setFactura(\Saba\FarmaciaBundle\Entity\FacturaDeProveedor $factura = null)
    {
        $this->factura = $factura;

        return $this;
    }

    /**
     * Get factura
     *
     * @return \Saba\FarmaciaBundle\Entity\FacturaDeProveedor 
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * Set articulo
     *
     * @param \Saba\FarmaciaBundle\Entity\Articulo $articulo
     * @return LineaDeFacturaDeProveedor
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
     * @return LineaDeFacturaDeProveedor
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
}
