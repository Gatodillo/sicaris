<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase GrupoDeMedicamentoAdmin
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
     * @ORM\Column(name="descripcion", type="string")
     */
    protected $descripcion;
    
    /**
     * @ORM\Column(name="esta_en_cuadro", type="boolean")
     */
    protected $estaEnCuadro;    
    
    /**
     * @ORM\Column(name="esta_activo", type="boolean")
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
     * @return GrupoDeMedicamento
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
     * @return GrupoDeMedicamento
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
     * @return GrupoDeMedicamento
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
     * @return GrupoDeMedicamento
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
