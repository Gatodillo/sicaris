<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase FamiliaAdmin.
 * Familia
 *
 * @ORM\Table(name="familias_de_medicamentos")
 * @ORM\Entity
 */
class Familia
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
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $clave;
    
    /**
     * TODO: Crear la entidad TipoDeAlmacen y relacionarlas.
     * @ORM\Column(type="string", name="tipo_de_almacen")
     */
    protected $tipoDeAlmacen;
    
    /**
     *
     * @ORM\Column(type="boolean", name="esta_activa", nullable=true)
     */
    protected $estaActiva;
    
    /**
     * @ORM\ManyToOne(targetEntity="Familia", inversedBy="subfamilias")
     * @ORM\JoinColumn(name="familia_padre_id", nullable=true)
     */
    protected $familiaPadre;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Familia", mappedBy="familiaPadre")
     */
    protected $subfamilias;    
    
    
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
     * Constructor
     */
    public function __construct()
    {
        $this->subfamilias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set clave
     *
     * @param string $clave
     * @return Familia
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Get clave
     *
     * @return string 
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set tipoDeAlmacen
     *
     * @param string $tipoDeAlmacen
     * @return Familia
     */
    public function setTipoDeAlmacen($tipoDeAlmacen)
    {
        $this->tipoDeAlmacen = $tipoDeAlmacen;

        return $this;
    }

    /**
     * Get tipoDeAlmacen
     *
     * @return string 
     */
    public function getTipoDeAlmacen()
    {
        return $this->tipoDeAlmacen;
    }

    /**
     * Set estaActiva
     *
     * @param boolean $estaActiva
     * @return Familia
     */
    public function setEstaActiva($estaActiva)
    {
        $this->estaActiva = $estaActiva;

        return $this;
    }

    /**
     * Get estaActiva
     *
     * @return boolean 
     */
    public function getEstaActiva()
    {
        return $this->estaActiva;
    }

    /**
     * Set nombreGenerico
     *
     * @param string $nombreGenerico
     * @return Familia
     */
    public function setNombreGenerico($nombreGenerico)
    {
        $this->nombreGenerico = $nombreGenerico;

        return $this;
    }

    /**
     * Get nombreGenerico
     *
     * @return string 
     */
    public function getNombreGenerico()
    {
        return $this->nombreGenerico;
    }

    /**
     * Set familiaPadre
     *
     * @param \Saba\FarmaciaBundle\Entity\Familia $familiaPadre
     * @return Familia
     */
    public function setFamiliaPadre(\Saba\FarmaciaBundle\Entity\Familia $familiaPadre = null)
    {
        $this->familiaPadre = $familiaPadre;

        return $this;
    }

    /**
     * Get familiaPadre
     *
     * @return \Saba\FarmaciaBundle\Entity\Familia 
     */
    public function getFamiliaPadre()
    {
        return $this->familiaPadre;
    }

    /**
     * Add subfamilias
     *
     * @param \Saba\FarmaciaBundle\Entity\Familia $subfamilias
     * @return Familia
     */
    public function addSubfamilia(\Saba\FarmaciaBundle\Entity\Familia $subfamilias)
    {
        $this->subfamilias[] = $subfamilias;

        return $this;
    }

    /**
     * Remove subfamilias
     *
     * @param \Saba\FarmaciaBundle\Entity\Familia $subfamilias
     */
    public function removeSubfamilia(\Saba\FarmaciaBundle\Entity\Familia $subfamilias)
    {
        $this->subfamilias->removeElement($subfamilias);
    }

    /**
     * Get subfamilias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubfamilias()
    {
        return $this->subfamilias;
    }
    
    public function __toString() {
        return $this->getClave() ?: "";
    }
}
