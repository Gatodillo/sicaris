<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Description of Ubicacion
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity
 * @ORM\Table(name="ubicaciones")
 */
class Ubicacion {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     * 
     */
    protected $nombre;
    
    /**
     * @ORM\OneToMany(targetEntity="ProductosPorUbicacion", mappedBy="ubicacion", cascade={"persist"})
     */
    protected $productos;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Ubicacion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add productos
     *
     * @param \Saba\FarmaciaBundle\Entity\ProductosPorUbicacion $productos
     * @return Ubicacion
     */
    public function addProducto(\Saba\FarmaciaBundle\Entity\ProductosPorUbicacion $producto)
    {
        $producto->setUbicacion($this);
        $this->productos[] = $producto;

        return $this;
    }

    /**
     * Remove productos
     *
     * @param \Saba\FarmaciaBundle\Entity\ProductosPorUbicacion $productos
     */
    public function removeProducto(\Saba\FarmaciaBundle\Entity\ProductosPorUbicacion $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }
    
    public function __toString() {
        return $this->getNombre() ?: "";
    }
    
    public function getExistenciaDe(Ubicacion $ubicacion, Medicamento $medicamento){
        foreach ($this->productos as $productosEnUbicacion ){
            if ($productosEnUbicacion->getProducto()->getCodigoDeBarras()
                    === $medicamento->getCodigoDeBarras()){
                return $productosEnUbicacion->getCantidad();
            }
        }
        return 0;
    }
    
    public function updateExistencias(Medicamento $medicamento, $cantidad){
        foreach ($this->productos as $productosEnUbicacion ){
            if ($productosEnUbicacion->getProducto()->getCodigoDeBarras()
                    === $medicamento->getCodigoDeBarras()){
                $productosEnUbicacion->setCantidad($cantidad);
                return $this;
            }
        }
        return $this;
    }
}
