<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="tipo_de_receta")
 * @ORM\Entity
 */
class TipoDeReceta
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
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    protected $nombre;
    
    /**
     * @ORM\Column(name="esta_activo", type="boolean",nullable=true)
     */
    protected $estaActivo;        
            
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
     * Set estaActivo
     *
     * @param boolean $estaActivo
     * @return UnidadDeMedida
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
     * Set nombre
     *
     * @param string $nombre
     * @return UnidadDeMedida
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
}
