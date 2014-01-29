<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of OtrasEntradas
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Table(name="otras_entradas")
 * @ORM\Entity
 */
class OtrasEntradas {
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
     * @ORM\Column(type="string", length=50)
     */
    protected $folioDeOficio;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $tipoDeEntrada;
    
    
    
    /**
     * @ORM\Column(type="date")
     */
    protected $fechaDeRecepcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Proveedor")
     * @ORM\JoinColumn(nullable=true)
     */
    private $proveedor;
    
    /**
     * @ORM\OneToMany(targetEntity="MovimientoDeOtrasEntradas", mappedBy="otrasEntradas")
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

    public function __toString() {
        return (string)$this->getNumero() ?: "";
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return OtrasEntradas
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
     * Set folioDeOficio
     *
     * @param string $folioDeOficio
     * @return OtrasEntradas
     */
    public function setFolioDeOficio($folioDeOficio)
    {
        $this->folioDeOficio = $folioDeOficio;

        return $this;
    }

    /**
     * Get folioDeOficio
     *
     * @return string 
     */
    public function getFolioDeOficio()
    {
        return $this->folioDeOficio;
    }

    /**
     * Set fechaDeRecepcion
     *
     * @param \DateTime $fechaDeRecepcion
     * @return OtrasEntradas
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
     * Set proveedor
     *
     * @param \Saba\FarmaciaBundle\Entity\Proveedor $proveedor
     * @return OtrasEntradas
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
     * Add movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeOtrasEntradas $movimientos
     * @return OtrasEntradas
     */
    public function addMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeOtrasEntradas $movimientos)
    {
        $this->movimientos[] = $movimientos;

        return $this;
    }

    /**
     * Remove movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeOtrasEntradas $movimientos
     */
    public function removeMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeOtrasEntradas $movimientos)
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

    /**
     * Set tipoDeEntrada
     *
     * @param string $tipoDeEntrada
     * @return OtrasEntradas
     */
    public function setTipoDeEntrada($tipoDeEntrada)
    {
        $this->tipoDeEntrada = $tipoDeEntrada;

        return $this;
    }

    /**
     * Get tipoDeEntrada
     *
     * @return string 
     */
    public function getTipoDeEntrada()
    {
        return $this->tipoDeEntrada;
    }
}
