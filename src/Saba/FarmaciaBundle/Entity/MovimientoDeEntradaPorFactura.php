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
 * @ORM\Table(name="movimientos_de_entrada_por_factura") 
 */
class MovimientoDeEntradaPorFactura extends Movimiento{

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="EntradaPorFactura", inversedBy="movimientos")
     * @ORM\JoinColumn(name="numero_de_entrada_id")
     */
    private $numeroDeEntrada;

   

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
     * Set numeroDeEntrada
     *
     * @param \Saba\FarmaciaBundle\Entity\EntradaPorFactura $numeroDeEntrada
     * @return MovimientoDeEntradaPorFactura
     */
    public function setNumeroDeEntrada(\Saba\FarmaciaBundle\Entity\EntradaPorFactura $numeroDeEntrada = null)
    {
        $this->numeroDeEntrada = $numeroDeEntrada;

        return $this;
    }

    /**
     * Get numeroDeEntrada
     *
     * @return \Saba\FarmaciaBundle\Entity\EntradaPorFactura 
     */
    public function getNumeroDeEntrada()
    {
        return $this->numeroDeEntrada;
    }
 
}
