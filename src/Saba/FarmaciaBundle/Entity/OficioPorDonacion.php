<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="oficios_por_donacion")
 * @ORM\Entity
 */
class OficioPorDonacion
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
     * @ORM\Column(type="string", length=50)
     */
    private $folio;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Proveedor")
     */
    private $donador;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $descripcion;
    
    
    /**
     *
     * @ORM\Column(name="fecha_de_recepcion", type="date")
     */
    private $fechaDeRecepcion;
    
    /**
     * @ORM\OneToMany(targetEntity="LineaDeOficioPorDonacion",
     *  mappedBy="oficio", cascade={"persist"})
     */
    public $lineas;
    
    
    
    public function __toString() {
        return $this->getFolio() ?: "";
    }
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
     * @return OficioPorDonacion
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return OficioPorDonacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaDeRecepcion
     *
     * @param \DateTime $fechaDeRecepcion
     * @return OficioPorDonacion
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
     * Set donador
     *
     * @param \Saba\FarmaciaBundle\Entity\Proveedor $donador
     * @return OficioPorDonacion
     */
    public function setDonador(\Saba\FarmaciaBundle\Entity\Proveedor $donador = null)
    {
        $this->donador = $donador;

        return $this;
    }

    /**
     * Get donador
     *
     * @return \Saba\FarmaciaBundle\Entity\Proveedor 
     */
    public function getDonador()
    {
        return $this->donador;
    }

    /**
     * Add lineas
     *
     * @param \Saba\FarmaciaBundle\Entity\LineasDeOficioDeDonacion $lineas
     * @return OficioPorDonacion
     */
    public function addLinea(\Saba\FarmaciaBundle\Entity\LineaDeOficioPorDonacion $lineas)
    {
        $lineas->setOficio($this);
        $this->lineas[] = $lineas;

        return $this;
    }

    /**
     * Remove lineas
     *
     * @param \Saba\FarmaciaBundle\Entity\LineasDeOficioDeDonacion $lineas
     */
    public function removeLinea(\Saba\FarmaciaBundle\Entity\LineasDeOficioDeDonacion $lineas)
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
}
