<?php
namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Movimiento
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="movimientos") 
 */
class Movimiento {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(name="fecha_de_registro", type="date")
     */
    protected $fechaDeRegistro;
    
    /**
     * @ORM\Column(name="fecha_de_ejecucion", type="date")
     */
    protected $fechaDeEjecucion;
    
    /**
     * @ORM\Column(name="almacen_origen", type="string")
     */
    protected $almacenOrigen;
    
    /**
     * @ORM\Column(name="almacen_destino", type="string")
     */
    protected $almacenDestino;
    
    /**
     * @ORM\OneToOne(targetEntity="Medicamento")
     * @ORM\JoinColumn(name="articulo_id", unique=false)
     */
    protected $articulo;
    
    
    /**
     * @ORM\Column(name="cantidad", type="integer")
     */
    protected $cantidad;
    
    /**
     * @ORM\Column(name="precio_unitario", type="float")
     */
    protected $precioUnitario;
    
    
    
    
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
     * Set fechaDeRegistro
     *
     * @param \DateTime $fechaDeRegistro
     * @return Movimiento
     */
    public function setFechaDeRegistro($fechaDeRegistro)
    {
        $this->fechaDeRegistro = $fechaDeRegistro;

        return $this;
    }

    /**
     * Get fechaDeRegistro
     *
     * @return \DateTime 
     */
    public function getFechaDeRegistro()
    {
        return $this->fechaDeRegistro;
    }

    /**
     * Set fechaDeEjecución
     *
     * @param \DateTime $fechaDeEjecución
     * @return Movimiento
     */
    public function setFechaDeEjecucion($fechaDeEjecucion)
    {
        $this->fechaDeEjecucion = $fechaDeEjecucion;

        return $this;
    }

    /**
     * Get fechaDeEjecución
     *
     * @return \DateTime 
     */
    public function getFechaDeEjecucion()
    {
        return $this->fechaDeEjecucion;
    }

    /**
     * Set almacenOrigen
     *
     * @param string $almacenOrigen
     * @return Movimiento
     */
    public function setAlmacenOrigen($almacenOrigen)
    {
        $this->almacenOrigen = $almacenOrigen;

        return $this;
    }

    /**
     * Get almacenOrigen
     *
     * @return string 
     */
    public function getAlmacenOrigen()
    {
        return $this->almacenOrigen;
    }

    /**
     * Set almacenDestino
     *
     * @param string $almacenDestino
     * @return Movimiento
     */
    public function setAlmacenDestino($almacenDestino)
    {
        $this->almacenDestino = $almacenDestino;

        return $this;
    }

    /**
     * Get almacenDestino
     *
     * @return string 
     */
    public function getAlmacenDestino()
    {
        return $this->almacenDestino;
    }

    /**
     * Set articulo
     *
     * @param string $articulo
     * @return Movimiento
     */
    public function setArticulo($articulo)
    {
        $this->articulo = $articulo;

        return $this;
    }

    /**
     * Get articulo
     *
     * @return string 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Movimiento
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
     * @return Movimiento
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
    
    public function __toString() {
        if ( null == $this->getArticulo()){
            return "";
        }
        return (" Artículo: " . $this->getArticulo()->getNombre() . " Cantidad: " . $this->cantidad );
    }
    
     /**
     * @ORM\PrePersist
     */
    public function prePersist(){
        $this;
        echo $this->getArticulo();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(){
        $this;
        echo $this->getArticulo();
    }
}
