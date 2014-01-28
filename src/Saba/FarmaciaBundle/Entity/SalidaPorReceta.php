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
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $numero;
    
    /**
     * @ORM\OneToOne(targetEntity="Receta", cascade={"persist"})
     * @ORM\JoinColumn(name="receta_id", referencedColumnName="id")
     */
    protected $receta;
    
    /**
     * @ORM\ManyToMany(targetEntity="Movimiento", cascade={ "persist", "remove"})
     * @ORM\JoinTable(name="salida_por_receta_tiene_movimientos",
     *     joinColumns={@ORM\JoinColumn(name="salidas_por_receta_id",
     *         referencedColumnName="numero")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="movimientos_id",
     *         referencedColumnName="id",
     *         unique=true)}
     *     )
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
     * Constructor
     */
    public function __construct()
    {
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
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
        return $this->numero;
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
        $medico = $this->getReceta()->getMedico();
        $paciente = $this->getReceta()->getPaciente();
        
        foreach ($this->getReceta()->getLineasDeReceta() as $key => $lineasDeReceta){
            $medicamentoEnReceta = $lineasDeReceta->getMedicamento();
            $cantidadEnReceta = $lineasDeReceta->getCantidad();
            //$unidadDelMedicamentoEnReceta = $lineaDeReceta->getUnidad();
            $cantidadEnExistencia = $this
                    ->getUbicacionOrigen()
                    ->getExistenciaDe($this->getUbicacionOrigen(),$medicamentoEnReceta)
                    ;
            if ($cantidadEnExistencia >= $cantidadEnReceta){
                $this->getUbicacionOrigen()
                        ->updateExistencias(
                                $medicamentoEnReceta,
                                $cantidadEnReceta
                        );
                $this->aniadirAMovimientos(
                        $medicamentoEnReceta,
                        $cantidadEnReceta
                        );
            }else if ($cantidadEnExistencia > 0){
                $this->getUbicacionOrigen()
                        ->updateExistencias(
                                $medicamentoEnReceta,
                                0
                        );

                $this->aniadirAMovimientos($medicamentoEnReceta, 
                                $cantidadEnExistencia);
                $this->aniadirAValeSubrogado(
                        $medicamentoEnReceta,
                        $cantidadEnReceta -
                        $cantidadEnExistencia
                        );
            }else{
                $this->aniadirAValeSubrogado(
                        $medicamentoEnReceta,
                        $cantidadEnReceta
                        );
            }
        }
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
     * @param \Saba\FarmaciaBundle\Entity\Movimiento $movimientos
     * @return SalidaPorReceta
     */
    public function addMovimientos(\Saba\FarmaciaBundle\Entity\Movimiento $movimientos)
    {
        $this->movimientos[] = $movimientos;

        return $this;
    }

    /**
     * Remove movimientos
     *
     * @param \Saba\FarmaciaBundle\Entity\Movimiento $movimientos
     */
    public function removeMovimiento(\Saba\FarmaciaBundle\Entity\Movimiento $movimientos)
    {
        $this->movimientos->removeElement($movimientos);
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
    public function addMovimiento(\Saba\FarmaciaBundle\Entity\Movimiento $movimientos)
    {
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
     * @ORM\PrePersist
     */
    public function prePersist(){
//        throw new \Exception();
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(){
//        throw new \Exception();
    }
    
    public function aniadirAMovimientos(Medicamento $medicamento, $cantidad){
        $movimiento = new Movimiento();
        
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
        
        $valeSubrogado->setRecetaOrigen($this->getReceta());
        $valeSubrogado->setMedico($this->getReceta()->getMedico());
        $valeSubrogado->setPaciente($this->getReceta()->getPaciente());
        $valeSubrogado->setFolio($this->getReceta()->getFolio());

        $lineaDeValeSubrogado = new LineaDeValeSubrogado();
        $lineaDeValeSubrogado->setMedicamento($medicamento);
        $lineaDeValeSubrogado->setCantidad($cantidad);
        $lineaDeValeSubrogado->setUnidad("Caja");
            
        $relacionValeSubrogadoTieneLineas = new ValeSubrogadoTieneLineas();
        $relacionValeSubrogadoTieneLineas->setValeSubrogado($valeSubrogado);
        $relacionValeSubrogadoTieneLineas->setLineaDeValeSubrogado($lineaDeValeSubrogado);
            
        $valeSubrogado->getLineasDeValeSubrogado()->add($relacionValeSubrogadoTieneLineas);
       
        $this->getReceta()->setValeSubrogado($valeSubrogado);
        
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
}
