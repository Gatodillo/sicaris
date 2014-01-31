<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of LineaDeReceta
 *
 * @ORM\Entity
 * @ORM\Table(name="lineas_de_receta")
 */
class LineaDeReceta {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Receta", inversedBy="lineasDeReceta")
     * 
     */
    protected $receta;
    
    /**
     * @ORM\ManyToOne(targetEntity="Medicamento")
     * @ORM\JoinColumn(name="medicamento_id", unique=false)
     */
    protected $medicamento;

    /**
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $indicaciones;

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
     * Set indicaciones
     *
     * @param string $indicaciones
     * @return LineaDeReceta
     */
    public function setIndicaciones($indicaciones)
    {
        $this->indicaciones = $indicaciones;

        return $this;
    }

    /**
     * Get indicaciones
     *
     * @return string 
     */
    public function getIndicaciones()
    {
        return $this->indicaciones;
    }

    /**
     * Set receta
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $receta
     * @return LineaDeReceta
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
     * Set medicamento
     *
     * @param \Saba\FarmaciaBundle\Entity\Medicamento $medicamento
     * @return LineaDeReceta
     */
    public function setMedicamento(\Saba\FarmaciaBundle\Entity\Medicamento $medicamento = null)
    {
        $this->medicamento = $medicamento;

        return $this;
    }

    /**
     * Get medicamento
     *
     * @return \Saba\FarmaciaBundle\Entity\Medicamento 
     */
    public function getMedicamento()
    {
        return $this->medicamento;
    }
}
