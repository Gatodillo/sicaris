<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Movimiento
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="movimientos_de_entrada_por_donacion") 
 */
class MovimientoDeEntradaPorDonacion extends Movimiento{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="EntradaPorDonacion", inversedBy="movimientos")
     * @ORM\JoinColumn(name="nea_id")
     */
    private $nea;

   

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
     * Set nea
     *
     * @param \Saba\FarmaciaBundle\Entity\EntradaPorDonacion $nea
     * @return MovimientoDeEntradaPorDonacion
     */
    public function setNea(\Saba\FarmaciaBundle\Entity\EntradaPorDonacion $nea = null)
    {
        $this->nea = $nea;

        return $this;
    }

    /**
     * Get nea
     *
     * @return \Saba\FarmaciaBundle\Entity\EntradaPorDonacion 
     */
    public function getNea()
    {
        return $this->nea;
    }
}
