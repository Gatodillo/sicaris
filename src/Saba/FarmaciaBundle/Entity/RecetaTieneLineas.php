<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of RecetaTieneLineas
 *
 * @author victor
 * @IgnoreAnnotation("author")
 * @ORM\Entity
 * @ORM\Table(name="receta_tiene_lineas");
 */
class RecetaTieneLineas {
    
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Receta", inversedBy="lineasDeReceta")
     * @ORM\JoinColumn(name="receta_id", referencedColumnName="id", nullable=false)
     */    
    protected $receta;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="LineaDeReceta", cascade={"persist"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="linea_de_receta_id", referencedColumnName="id", unique=true)
     */    
    protected $lineaDeReceta;

    /**
     * Set lineaDeReceta
     *
     * @param \Saba\FarmaciaBundle\Entity\LineaDeReceta $lineaDeReceta
     * @return RecetaTieneLineas
     */
    public function setLineaDeReceta(\Saba\FarmaciaBundle\Entity\LineaDeReceta $lineaDeReceta = null)
    {
        $this->lineaDeReceta = $lineaDeReceta;

        return $this;
    }

    /**
     * Get lineaDeReceta
     *
     * @return \Saba\FarmaciaBundle\Entity\LineaDeReceta 
     */
    public function getLineaDeReceta()
    {
        return $this->lineaDeReceta;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return RecetaTieneLineas
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set receta
     *
     * @param \Saba\FarmaciaBundle\Entity\Receta $receta
     * @return RecetaTieneLineas
     */
    public function setReceta(\Saba\FarmaciaBundle\Entity\Receta $receta = null)
    {
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
   
    public function __toString() {
        return (string)$this->getReceta()->getFolio() ?: "";
    }
}
