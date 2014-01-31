<?php
namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Salida
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="salidas_por_receta") 
 */
class SalidaPorReceta {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $numero;
    
    
    /**
     * @ORM\OneToOne(targetEntity="Receta", cascade={"persist"})
     * @ORM\JoinColumn(name="receta_id", referencedColumnName="id")
     */
    protected $receta;
    
    /**
     * @ORM\OneToMany(targetEntity="MovimientoDeSalidaPorReceta", mappedBy="salidaPorReceta", cascade={"all"}, orphanRemoval=true)
     */
    protected $movimientos;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion", cascade={"persist"})
     * @ORM\JoinColumn(name="ubicacion_origen_id", referencedColumnName="id")
     */
    protected $ubicacionOrigen;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion", cascade={"persist"})
     * @ORM\JoinColumn(name="ubicacion_destino_id", referencedColumnName="id")
     */
    protected $ubicacionDestino;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="EstadoDeReceta");
     * @ORM\JoinColumn(name="estado_id",nullable=false)
     */
   protected $estado;
           
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function aniadirAMovimientos(Medicamento $medicamento, $cantidad){
        $movimiento = new MovimientoDeSalidaPorReceta();
        
        $movimiento->setArticulo($medicamento);
        $movimiento->setCantidad($cantidad);
        $this->addMovimiento($movimiento);
                
        return $this;
    }
    
    public function aniadirAValeSubrogado(Medicamento $medicamento, $cantidad){

        if ($this->getReceta() == NULL) return $this;
        
        $valeSubrogado = $this->getReceta()->getValeSubrogado() != NULL
                ? $this->getReceta()->getValeSubrogado() 
                : new ValeSubrogado();
        
        $valeSubrogado->setReceta($this->getReceta());
        $valeSubrogado->setMedico($this->getReceta()->getMedico());
        $valeSubrogado->setPaciente($this->getReceta()->getPaciente());
        $valeSubrogado->setFolio($this->getReceta()->getFolio());

        $lineaDeValeSubrogado = new LineaDeValeSubrogado();
        $lineaDeValeSubrogado->setMedicamento($medicamento);
        $lineaDeValeSubrogado->setCantidad($cantidad);
        $lineaDeValeSubrogado->setUnidad("Caja");
            
        $valeSubrogado->addLinea($lineaDeValeSubrogado);
       
        $this->getReceta()->setValeSubrogado($valeSubrogado);
        
        return $this;
    }
        
    
    
    
    
    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }
    
    
    /**
     * Get numero
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set receta
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $receta
     * @return SalidaPorReceta
     */
    public function setReceta(\Saba\FarmaciaBundle\Entity\Receta $receta = null)
    {
        /*if ($receta->getValeSubrogado() == NULL){
            return $this;
        }*/
        
        $this->receta = $receta;

    }


    /**
     * Get receta
     *
     * @return \Saba\FarmaciaBundle\Entity\Receta 
     */
    public function getReceta()
    {
        return $this->receta;
    }

    /**
     * Add movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeSalidaPorReceta $movimientos
     * @return SalidaPorReceta
     */
    public function addMovimientos(\Saba\FarmaciaBundle\Entity\MovimientoDeSalidaPorReceta $movimientos)
    {
        $movimientos->setSalidaPorReceta($this);;
        $this->movimientos[] = $movimientos;

        return $this;
    }

    /**
     * Remove movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\MovimientoDeSalidaPorReceta $movimientos
     */
    public function removeMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeSalidaPorReceta $movimientos)
    {
        $movimientos->setSalidaPorReceta(null);
        $this->movimientos->removeElement($movimientos);
    }

    public function clearMovimientos(){
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Get movimientos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovimientos()
    {
        return $this->movimientos;
    }

    /**
     * Add movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\Movimiento $movimientos
     * @return SalidaPorReceta
     */
    public function addMovimiento(\Saba\FarmaciaBundle\Entity\MovimientoDeSalidaPorReceta $movimientos)
    {
        $movimientos->setSalidaPorReceta($this);
        $this->movimientos[] = $movimientos;

        return $this;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return SalidaPorReceta
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
    
    /**
     * Set ubicacionOrigen
     *
     * @param \Saba\FarmaciaBundle\Entity\Ubicacion $ubicacionOrigen
     * @return SalidaPorReceta
     */
    public function setUbicacionOrigen(\Saba\FarmaciaBundle\Entity\Ubicacion $ubicacionOrigen = null)
    {
        $this->ubicacionOrigen = $ubicacionOrigen;

        return $this;
    }

    /**
     * Get ubicacionOrigen
     *
     * @return \Saba\FarmaciaBundle\Entity\Ubicacion 
     */
    public function getUbicacionOrigen()
    {
        return $this->ubicacionOrigen;
    }

    /**
     * Set ubicacionDestino
     *
     * @param \Saba\FarmaciaBundle\Entity\Ubicacion $ubicacionDestino
     * @return SalidaPorReceta
     */
    public function setUbicacionDestino(\Saba\FarmaciaBundle\Entity\Ubicacion $ubicacionDestino = null)
    {
        $this->ubicacionDestino = $ubicacionDestino;

        return $this;
    }

    /**
     * Get ubicacionDestino
     *
     * @return \Saba\FarmaciaBundle\Entity\Ubicacion 
     */
    public function getUbicacionDestino()
    {
        return $this->ubicacionDestino;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return SalidaPorReceta
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function __toString() {
        return (string)($this->getNumero()) ?: "";
    }

    /**
     * Set estado
     *
     * @param \Saba\FarmaciaBundle\Entity\EstadoDeReceta $estado
     * @return SalidaPorReceta
     */
    public function setEstado(\Saba\FarmaciaBundle\Entity\EstadoDeReceta $estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \Saba\FarmaciaBundle\Entity\EstadoDeReceta 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
