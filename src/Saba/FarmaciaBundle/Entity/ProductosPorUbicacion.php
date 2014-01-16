<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Description of ProductosPorUbicacion
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity;
 * @ORM\Table(name="productos_por_ubicacion")
 */
class ProductosPorUbicacion {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion", inversedBy="productos");
     * @ORM\JoinColumn(nullable=false)
     */
    protected $ubicacion;
    
    /**
     * @ORM\ManyToOne(targetEntity="Medicamento")
     */
    protected $producto;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $cantidad;
    

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
     * @return ProductosPorUbicacion
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
     * Set ubicacion
     *
     * @param \Saba\FarmaciaBundle\Entity\Ubicacion $ubicacion
     * @return ProductosPorUbicacion
     */
    public function setUbicacion(\Saba\FarmaciaBundle\Entity\Ubicacion $ubicacion = null)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return \Saba\FarmaciaBundle\Entity\Ubicacion 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set productos
     *
     * @param \Saba\FarmaciaBundle\Entity\Productos $productos
     * @return ProductosPorUbicacion
     */
    public function setProducto(\Saba\FarmaciaBundle\Entity\Medicamento $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get productos
     *
     * @return \Saba\FarmaciaBundle\Entity\Medicamento 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
