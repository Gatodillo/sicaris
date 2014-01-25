<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="grupos_de_medicamento")
 * @ORM\Entity
 */
class GrupoDeMedicamento
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
     * @ORM\Column(name="clave", type="string", length=50)
     */
    protected $clave;
    
    /**
     * @ORM\Column(name="descripcion", type="string", nullable=true)
     */
    protected $descripcion;
    
    /**
     * @ORM\Column(name="esta_en_cuadro", type="boolean", nullable=true)
     */
    protected $estaEnCuadro;    
    
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
     * Set clave
     *
     * @param string $clave
     * @return UnidadDeMedida
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return UnidadDeMedida
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
     * Set estaEnCuadro
     *
     * @param boolean $estaEnCuadro
     * @return UnidadDeMedida
     */
    public function setEstaEnCuadro($estaEnCuadro)
    {
        $this->estaEnCuadro = $estaEnCuadro;

        return $this;
    }

    /**
     * Get estaEnCuadro
     *
     * @return boolean 
     */
    public function getEstaEnCuadro()
    {
        return $this->estaEnCuadro;
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
}
