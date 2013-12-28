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
 * @ORM\Table{name="salidas_por_receta"} 
 */
class SalidaPorReceta {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $numero;
    
    /**
     * @ORM\OneToOne(targetEntity="Receta")
     * @ORM\JoinColumn(name="receta_id", referencedColumnName="folio")
     */
    protected $receta;
    
    /**
     * @ORM\ManyToMany(targetEntity="Movimiento")
     * @ORM\JoinTable(name="SalidaPorRecetaTieneMovimientos",
     *     joinColumns={@ORM\JoinColumn(name="salidas_por_receta_id",
     *         referencedColumnName="numero")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="movimientos_id",
     *         referencedColumnName="id",
     *         unique=true)}
     *     )
     */
    protected $movimientos;
    
    public function _construct(){
        $this->movimientos = new \Doctrine\Common\Collections\ArrayCollection();
    }
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
     * Set receta
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $receta
     * @return SalidaPorReceta
     */
    public function setReceta(\Saba\FarmaciaBundle\Entity\Receta $receta = null)
    {
        $this->receta = $receta;

        return $this;
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
}
