<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Receta
 *
 * @author victor
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="recetas")
 */
class Receta {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $folio;
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="receta", inversedBy="recetasHijas")
     * @ORM\JoinColumn(name="receta_padre_id", referencedColumnName="folio")
     */
    protected $recetaPadre;
    
    /**
     * @ORM\OneToMany(targetEntity="receta", mappedBy="recetaPadre")
     */
    protected $recetasHijas;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $medico;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $paciente;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $medicamentos;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->recetasHijas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    

    /**
     * Get folio
     *
     * @return integer 
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Set recetaPadre
     *
     * @param integer $recetaPadre
     * @return Receta
     */
    public function setRecetaPadre($recetaPadre)
    {
        $this->recetaPadre = $recetaPadre;

        return $this;
    }

    /**
     * Get recetaPadre
     *
     * @return integer 
     */
    public function getRecetaPadre()
    {
        return $this->recetaPadre;
    }

    /**
     * Set medico
     *
     * @param string $medico
     * @return Receta
     */
    public function setMedico($medico)
    {
        $this->medico = $medico;

        return $this;
    }

    /**
     * Get medico
     *
     * @return string 
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Set paciente
     *
     * @param string $paciente
     * @return Receta
     */
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get paciente
     *
     * @return string 
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Set medicamentos
     *
     * @param string $medicamentos
     * @return Receta
     */
    public function setMedicamentos($medicamentos)
    {
        $this->medicamentos = $medicamentos;

        return $this;
    }

    /**
     * Get medicamentos
     *
     * @return string 
     */
    public function getMedicamentos()
    {
        return $this->medicamentos;
    }

    /**
     * Add recetasHijas
     *
     * @param \Saba\FarmaciaBundle\Entity\receta $recetasHijas
     * @return Receta
     */
    public function addRecetasHija(\Saba\FarmaciaBundle\Entity\receta $recetasHijas)
    {
        $this->recetasHijas[] = $recetasHijas;

        return $this;
    }

    /**
     * Remove recetasHijas
     *
     * @param \Saba\FarmaciaBundle\Entity\receta $recetasHijas
     */
    public function removeRecetasHija(\Saba\FarmaciaBundle\Entity\receta $recetasHijas)
    {
        $this->recetasHijas->removeElement($recetasHijas);
    }

    /**
     * Get recetasHijas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecetasHijas()
    {
        return $this->recetasHijas;
    }

    /**
     * Set folio
     *
     * @param integer $folio
     * @return Receta
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;
        $this->recetaPadre = $folio;
        $this->medico = $folio;
        $this->paciente = $folio;

        return $this;
    }
}
