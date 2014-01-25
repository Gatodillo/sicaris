<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase OrdenDeCompraAdmin
 * OrdenDeCompra
 *
 * @ORM\Table(name="ordenes_de_compra")
 * @ORM\Entity
 */
class OrdenDeCompra
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
    private $numero;
    
    /**
     * @ORM\Column(type="date")
     */
    private $fechaDeElaboracion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Proveedor", cascade={"persist"})
     * @ORM\JoinColumn(name="proveedor_id")
     */
    private $proveedor;
    
    /**
     * @ORM\OneToMany(targetEntity="FacturaDeProveedor",
     *      mappedBy="ordenDeCompra",
     *      cascade={"persist"})
     */
    private $facturas;
    
    /**
     * TODO: Crear la entidad EstadoDeOrdenDeCompra y relacionarlas.
     * @return type
     */
    //private $estado;

    public function __toString() {
        return $this->getNumero() ?: "";
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->facturas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set numero
     *
     * @param string $numero
     * @return OrdenDeCompra
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set fechaDeElaboracion
     *
     * @param \DateTime $fechaDeElaboracion
     * @return OrdenDeCompra
     */
    public function setFechaDeElaboracion($fechaDeElaboracion)
    {
        $this->fechaDeElaboracion = $fechaDeElaboracion;

        return $this;
    }

    /**
     * Get fechaDeElaboracion
     *
     * @return \DateTime 
     */
    public function getFechaDeElaboracion()
    {
        return $this->fechaDeElaboracion;
    }

    /**
     * Set proveedor
     *
     * @param \Saba\FarmaciaBundle\Entity\Proveedor $proveedor
     * @return OrdenDeCompra
     */
    public function setProveedor(\Saba\FarmaciaBundle\Entity\Proveedor $proveedor = null)
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    /**
     * Get proveedor
     *
     * @return \Saba\FarmaciaBundle\Entity\Proveedor 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }


    /**
     * Add facturas
     *
     * @param \Saba\FarmaciaBundle\Entity\FacturaDeProveedor $facturas
     * @return OrdenDeCompra
     */
    public function addFactura(\Saba\FarmaciaBundle\Entity\FacturaDeProveedor $factura)
    {
        $factura->setOrdenDeCompra($this);
        $this->facturas[] = $factura;

        return $this;
    }

    /**
     * Remove facturas
     *
     * @param \Saba\FarmaciaBundle\Entity\FacturaDeProveedor $facturas
     */
    public function removeFactura(\Saba\FarmaciaBundle\Entity\FacturaDeProveedor $facturas)
    {
        $this->facturas->removeElement($facturas);
    }

    /**
     * Get facturas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFacturas()
    {
        return $this->facturas;
    }
}
