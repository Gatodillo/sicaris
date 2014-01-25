<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase ContactoDeProveedorAdmin
 * Proveedor
 *
 * @ORM\Table(name="contactos_de_proveedor")
 * @ORM\Entity
 */
class ContactoDeProveedor
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
    private $nombre;
    
    /**
     * @ORM\ManyToOne(targetEntity="Proveedor",
     *  inversedBy="contactos",
     *  cascade={"persist"})
     */
    private $empresa;
    
    /**
     * @ORM\Column(type="string")
     */
    private $rol;
    
    /**
     * @ORM\Column(type="string")
     */
    private $calle;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $numeroInterior;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroExterior;    
    
    /**
     * @ORM\Column(type="string")
     */
    private $colonia;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $codigoPostal;    
    
    /**
     * @ORM\Column(type="string")
     */
    private $municipio;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $entidadFederativa;
    
    /**
     * @ORM\Column(type="string")
     */
    private $telefono;
    
    /**
     * @ORM\Column(type="string")
     */
    private $email;    
    
    
    public function __toString() {
        return $this->getNombre() ?: "";
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
     * @return ContactoDeProveedor
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
     * Set rol
     *
     * @param string $rol
     * @return ContactoDeProveedor
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string 
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return ContactoDeProveedor
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set numeroInterior
     *
     * @param integer $numeroInterior
     * @return ContactoDeProveedor
     */
    public function setNumeroInterior($numeroInterior)
    {
        $this->numeroInterior = $numeroInterior;

        return $this;
    }

    /**
     * Get numeroInterior
     *
     * @return integer 
     */
    public function getNumeroInterior()
    {
        return $this->numeroInterior;
    }

    /**
     * Set numeroExterior
     *
     * @param integer $numeroExterior
     * @return ContactoDeProveedor
     */
    public function setNumeroExterior($numeroExterior)
    {
        $this->numeroExterior = $numeroExterior;

        return $this;
    }

    /**
     * Get numeroExterior
     *
     * @return integer 
     */
    public function getNumeroExterior()
    {
        return $this->numeroExterior;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     * @return ContactoDeProveedor
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string 
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set codigoPostal
     *
     * @param integer $codigoPostal
     * @return ContactoDeProveedor
     */
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get codigoPostal
     *
     * @return integer 
     */
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     * @return ContactoDeProveedor
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string 
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set entidadFederativa
     *
     * @param integer $entidadFederativa
     * @return ContactoDeProveedor
     */
    public function setEntidadFederativa($entidadFederativa)
    {
        $this->entidadFederativa = $entidadFederativa;

        return $this;
    }

    /**
     * Get entidadFederativa
     *
     * @return integer 
     */
    public function getEntidadFederativa()
    {
        return $this->entidadFederativa;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return ContactoDeProveedor
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ContactoDeProveedor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set empresa
     *
     * @param \Saba\FarmaciaBundle\Entity\Proveedor $empresa
     * @return ContactoDeProveedor
     */
    public function setEmpresa(\Saba\FarmaciaBundle\Entity\Proveedor $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \Saba\FarmaciaBundle\Entity\Proveedor 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }
}
