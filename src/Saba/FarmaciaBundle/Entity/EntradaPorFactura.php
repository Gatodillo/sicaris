<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of EntradaPorFactura
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Table(name="entradas_por_factura")
 * @ORM\Entity
 */
class EntradaPorFactura {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $numero;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $nea;
    
    /**
     * @ORM\ManyToOne(targetEntity="OrdenDeCompra")
     * @ORM\JoinColumn(name="orden_de_compra_id")
     */
    protected $orden;
    
    /**
     * @ORM\OneToMany(targetEntity="MovimientoDeEntradaPorFactura", mappedBy="numeroDeEntrada")
     */
    protected $movimientos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param integer $numero
     * @return EntradaPorFactura
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set nea
     *
     * @param integer $nea
     * @return EntradaPorFactura
     */
    public function setNea($nea)
    {
        $this->nea = $nea;

        return $this;
    }

    /**
     * Get nea
     *
     * @return integer 
     */
    public function getNea()
    {
        return $this->nea;
    }

    /**
     * Set orden
     *
     * @param \Saba\FarmaciaBundle\Entity\ordenDeCompra $orden
     * @return EntradaPorFactura
     */
    public function setOrden(\Saba\FarmaciaBundle\Entity\ordenDeCompra $orden = null)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return \Saba\FarmaciaBundle\Entity\ordenDeCompra 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Add movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorFactura $movimientos
     * @return EntradaPorFactura
     */
    public function addMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorFactura $movimientos)
    {
        $this->movimientos[] = $movimientos;

        return $this;
    }

    /**
     * Remove movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorFactura $movimientos
     */
    public function removeMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeEntradaPorFactura $movimientos)
    {
        $this->movimientos->removeElement($movimientos);
    }

    /**
     * Get movimientos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovimientos()
    {
        return $this->movimientos;
    }
}
