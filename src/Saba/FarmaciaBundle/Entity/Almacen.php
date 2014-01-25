<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Description of Almacen
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity;
 * @ORM\Table(name="almacenes")
 */
class Almacen {
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
     * @ORM\OneToOne(targetEntity="Ubicacion")
     */
    protected $ubicacionDeEntrada;
    
    /**
     * @ORM\OneToOne(targetEntity="Ubicacion")
     */
    protected $ubicacionDeSalida;
    
    /**
     * @ORM\OneToOne(targetEntity="Ubicacion")
     */
    protected $ubicacionDeAlmacenamiento;
    
    /**
     * @ORM\OneToMany(targetEntity="Almacen", mappedBy="almacenPadre")
     */
    protected $subalmacenes;
    
    /**
     * @ORM\ManyToOne(targetEntity="Almacen", inversedBy="subalmacenes", cascade={"persist"})
     */
    protected $almacenPadre;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subalmacenes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Almacen
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
     * Set ubicacionDeEntrada
     *
     * @param \Saba\FarmaciaBundle\Entity\ubicacion $ubicacionDeEntrada
     * @return Almacen
     */
    public function setUbicacionDeEntrada(\Saba\FarmaciaBundle\Entity\ubicacion $ubicacionDeEntrada = null)
    {
        $this->ubicacionDeEntrada = $ubicacionDeEntrada;

        return $this;
    }

    /**
     * Get ubicacionDeEntrada
     *
     * @return \Saba\FarmaciaBundle\Entity\ubicacion 
     */
    public function getUbicacionDeEntrada()
    {
        return $this->ubicacionDeEntrada;
    }

    /**
     * Set ubicacionDeSalida
     *
     * @param \Saba\FarmaciaBundle\Entity\ubicacion $ubicacionDeSalida
     * @return Almacen
     */
    public function setUbicacionDeSalida(\Saba\FarmaciaBundle\Entity\ubicacion $ubicacionDeSalida = null)
    {
        $this->ubicacionDeSalida = $ubicacionDeSalida;

        return $this;
    }

    /**
     * Get ubicacionDeSalida
     *
     * @return \Saba\FarmaciaBundle\Entity\ubicacion 
     */
    public function getUbicacionDeSalida()
    {
        return $this->ubicacionDeSalida;
    }

    /**
     * Set ubicacionDeAlmacenamiento
     *
     * @param \Saba\FarmaciaBundle\Entity\ubicacion $ubicacionDeAlmacenamiento
     * @return Almacen
     */
    public function setUbicacionDeAlmacenamiento(\Saba\FarmaciaBundle\Entity\ubicacion $ubicacionDeAlmacenamiento = null)
    {
        $this->ubicacionDeAlmacenamiento = $ubicacionDeAlmacenamiento;

        return $this;
    }

    /**
     * Get ubicacionDeAlmacenamiento
     *
     * @return \Saba\FarmaciaBundle\Entity\ubicacion 
     */
    public function getUbicacionDeAlmacenamiento()
    {
        return $this->ubicacionDeAlmacenamiento;
    }

    /**
     * Add subalmacenes
     *
     * @param \Saba\FarmaciaBundle\Entity\Almacen $subalmacenes
     * @return Almacen
     */
    public function addSubalmacene(\Saba\FarmaciaBundle\Entity\Almacen $subalmacenes)
    {
        $this->subalmacenes[] = $subalmacenes;

        return $this;
    }

    /**
     * Remove subalmacenes
     *
     * @param \Saba\FarmaciaBundle\Entity\Almacen $subalmacenes
     */
    public function removeSubalmacene(\Saba\FarmaciaBundle\Entity\Almacen $subalmacenes)
    {
        $this->subalmacenes->removeElement($subalmacenes);
    }

    /**
     * Get subalmacenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubalmacenes()
    {
        return $this->subalmacenes;
    }

    /**
     * Set almacenPadre
     *
     * @param \Saba\FarmaciaBundle\Entity\Almacen $almacenPadre
     * @return Almacen
     */
    public function setAlmacenPadre(\Saba\FarmaciaBundle\Entity\Almacen $almacenPadre = null)
    {
        $this->almacenPadre = $almacenPadre;

        return $this;
    }

    /**
     * Get almacenPadre
     *
     * @return \Saba\FarmaciaBundle\Entity\Almacen 
     */
    public function getAlmacenPadre()
    {
        return $this->almacenPadre;
    }
    
    public function __toString() {
        return $this->getNombre() ?: "";
    }
}
