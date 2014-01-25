<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase ProveedorAdmin
 * Proveedor
 *
 * @ORM\Table(name="proveedores")
 * @ORM\Entity
 */
class Proveedor
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
    private $clave;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $numeroDeRegistroEnPadronDeProveedores;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;
    
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $rfc;
    
    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $curp;
    
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaDeVigencia;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $estaActivo;
    
    /**
     * @ORM\OneToMany(targetEntity="ContactoDeProveedor",
     *      mappedBy="empresa",
     *      cascade={"persist"})
     */
    private $contactos;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoDeProveedor", cascade={"persist"})
     * @ORM\JoinColumn(name="tipo_de_proveedor_id")
     */
    private $tipoDeProveedor;
    
    public function __toString() {
        return $this->getClave() ?: "";
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set clave
     *
     * @param string $clave
     * @return Proveedor
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
     * Set numeroDeRegistroEnPadronDeProveedores
     *
     * @param integer $numeroDeRegistroEnPadronDeProveedores
     * @return Proveedor
     */
    public function setNumeroDeRegistroEnPadronDeProveedores($numeroDeRegistroEnPadronDeProveedores)
    {
        $this->numeroDeRegistroEnPadronDeProveedores = $numeroDeRegistroEnPadronDeProveedores;

        return $this;
    }

    /**
     * Get numeroDeRegistroEnPadronDeProveedores
     *
     * @return integer 
     */
    public function getNumeroDeRegistroEnPadronDeProveedores()
    {
        return $this->numeroDeRegistroEnPadronDeProveedores;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Proveedor
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
     * Set rfc
     *
     * @param string $rfc
     * @return Proveedor
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string 
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set curp
     *
     * @param string $curp
     * @return Proveedor
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    /**
     * Get curp
     *
     * @return string 
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set fechaDeVigencia
     *
     * @param \DateTime $fechaDeVigencia
     * @return Proveedor
     */
    public function setFechaDeVigencia($fechaDeVigencia)
    {
        $this->fechaDeVigencia = $fechaDeVigencia;

        return $this;
    }

    /**
     * Get fechaDeVigencia
     *
     * @return \DateTime 
     */
    public function getFechaDeVigencia()
    {
        return $this->fechaDeVigencia;
    }

    /**
     * Set estaActivo
     *
     * @param boolean $estaActivo
     * @return Proveedor
     */
    public function setEstaActivo($estaActivo)
    {
        $this->estaActivo = $estaActivo;

        return $this;
    }

    /**
     * Get estaActivo
     *
     * @return boolean 
     */
    public function getEstaActivo()
    {
        return $this->estaActivo;
    }

    /**
     * Add contactos
     *
     * @param \Saba\FarmaciaBundle\Entity\Contacto $contactos
     * @return Proveedor
     */
    public function addContacto(\Saba\FarmaciaBundle\Entity\Contacto $contactos)
    {
        $this->contactos[] = $contactos;

        return $this;
    }

    /**
     * Remove contactos
     *
     * @param \Saba\FarmaciaBundle\Entity\Contacto $contactos
     */
    public function removeContacto(\Saba\FarmaciaBundle\Entity\Contacto $contactos)
    {
        $this->contactos->removeElement($contactos);
    }

    /**
     * Get contactos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactos()
    {
        return $this->contactos;
    }

    /**
     * Set tipoDeProveedor
     *
     * @param \Saba\FarmaciaBundle\Entity\TipoDeProveedor $tipoDeProveedor
     * @return Proveedor
     */
    public function setTipoDeProveedor(\Saba\FarmaciaBundle\Entity\TipoDeProveedor $tipoDeProveedor = null)
    {
        $this->tipoDeProveedor = $tipoDeProveedor;

        return $this;
    }

    /**
     * Get tipoDeProveedor
     *
     * @return \Saba\FarmaciaBundle\Entity\TipoDeProveedor 
     */
    public function getTipoDeProveedor()
    {
        return $this->tipoDeProveedor;
    }
}
