<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase FacturaDeProveedorAdmin
 * FacturadeProveedor
 *
 * @ORM\Table(name="facturas_de_proveedor")
 * @ORM\Entity
 */
class FacturaDeProveedor
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
    private $folio;
    
    /**
     * @ORM\ManyToOne(targetEntity="OrdenDeCompra", inversedBy="facturas")
     * @ORM\JoinColumn(name="orden_de_compra_id")
     */
    private $ordenDeCompra;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Proveedor")
     */
    private $proveedor;

    /**
     * @ORM\Column(type="date", name="fecha_de_recepcion")
     */
    private $fechaDeRecepcion;
    

    /**
     * @ORM\OneToMany(targetEntity="LineaDeFacturaDeProveedor", 
     *  mappedBy="factura", cascade={"persist"})
     */
    private $lineas;
    
    /**
     * @ORM\Column(name="total", type="float")
     * 
     */
    private $total;
    
    /**
     * @ORM\Column(name="subtotal", type="float")
     * 
     */
    private $subtotal;
    
    
    /**
     * Crear la entidad EstadoDeFacturaDeProveedor y relacionarlas.
     */
    //private $estado;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lineas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set folio
     *
     * @param string $folio
     * @return FacturaDeProveedor
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;

        return $this;
    }

    /**
     * Get folio
     *
     * @return string 
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Set fechaDeRecepcion
     *
     * @param \DateTime $fechaDeRecepcion
     * @return FacturaDeProveedor
     */
    public function setFechaDeRecepcion($fechaDeRecepcion)
    {
        $this->fechaDeRecepcion = $fechaDeRecepcion;

        return $this;
    }

    /**
     * Get fechaDeRecepcion
     *
     * @return \DateTime 
     */
    public function getFechaDeRecepcion()
    {
        return $this->fechaDeRecepcion;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return FacturaDeProveedor
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set subtotal
     *
     * @param float $subtotal
     * @return FacturaDeProveedor
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
     * Set proveedor
     *
     * @param \Saba\FarmaciaBundle\Entity\Proveedor $proveedor
     * @return FacturaDeProveedor
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
     * Add lineas
     *
     * @param \Saba\FarmaciaBundle\Entity\LineaDeFacturaDeProveedor $lineas
     * @return FacturaDeProveedor
     */
    public function addLinea(\Saba\FarmaciaBundle\Entity\LineaDeFacturaDeProveedor $lineas)
    {
        $this->lineas[] = $lineas;

        return $this;
    }

    /**
     * Remove lineas
     *
     * @param \Saba\FarmaciaBundle\Entity\LineaDeFacturaDeProveedor $lineas
     */
    public function removeLinea(\Saba\FarmaciaBundle\Entity\LineaDeFacturaDeProveedor $lineas)
    {
        $this->lineas->removeElement($lineas);
    }

    /**
     * Get lineas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLineas()
    {
        return $this->lineas;
    }
    
    public function __toString() {
        return $this->getFolio() ?: "";
    }

    /**
     * Set ordenDeCompra
     *
     * @param \Saba\FarmaciaBundle\Entity\OrdenDeCompra $ordenDeCompra
     * @return FacturaDeProveedor
     */
    public function setOrdenDeCompra(\Saba\FarmaciaBundle\Entity\OrdenDeCompra $ordenDeCompra = null)
    {
        $this->ordenDeCompra = $ordenDeCompra;

        return $this;
    }

    /**
     * Get ordenDeCompra
     *
     * @return \Saba\FarmaciaBundle\Entity\OrdenDeCompra 
     */
    public function getOrdenDeCompra()
    {
        return $this->ordenDeCompra;
    }
}
