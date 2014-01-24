<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase VariacionesDeMedicamentoAdmin.
 * VariacionesDeMedicamento
 *
 * @ORM\Table(name="variaciones_de_medicamento")
 * @ORM\Entity
 */
class VariacionesDeMedicamento
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
     * ORM\ManyToOne(targetentity="Medicamento", inversedBy="variaciones")
     */
    protected $variaciones;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $nombreComercial;
    
    /**
     * @ORM\ManyToOne(targetEntity="FormaFarmaceutica")
     */
    protected $formaFarmaceutica;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $concentracion;
    
    /**
     * TODO: Catálogo de unidades del SI.
     * @ORM\Column(type="string")
     */
    protected $unidadInternacional;
    
    /**
     * TODO: Crear entidad EnvaseDeMedicamento y relacionarlas.
     * @ORM\ManyToOne(targetEntity="EnvaseDeMedicamento")
     */
    protected $envasePrimario;
    
    /**
     * @ORM\ManyToOne(targetEntity="EnvaseDeMedicamento")
     */
    protected $envaseSecundario;
    
    /**
     * @ORM\ManyToOne(targetEntity="EnvaseDeMedicamento")
     */
    protected $envaseAdicional;
    
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
     * Set nombreComercial
     *
     * @param string $nombreComercial
     * @return VariacionesDeMedicamento
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;

        return $this;
    }

    /**
     * Get nombreComercial
     *
     * @return string 
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }

    /**
     * Set concentracion
     *
     * @param integer $concentracion
     * @return VariacionesDeMedicamento
     */
    public function setConcentracion($concentracion)
    {
        $this->concentracion = $concentracion;

        return $this;
    }

    /**
     * Get concentracion
     *
     * @return integer 
     */
    public function getConcentracion()
    {
        return $this->concentracion;
    }

    /**
     * Set unidadInternacional
     *
     * @param string $unidadInternacional
     * @return VariacionesDeMedicamento
     */
    public function setUnidadInternacional($unidadInternacional)
    {
        $this->unidadInternacional = $unidadInternacional;

        return $this;
    }

    /**
     * Get unidadInternacional
     *
     * @return string 
     */
    public function getUnidadInternacional()
    {
        return $this->unidadInternacional;
    }

    /**
     * Set formaFarmaceutica
     *
     * @param \Saba\FarmaciaBundle\Entity\FormaFarmaceutica $formaFarmaceutica
     * @return VariacionesDeMedicamento
     */
    public function setFormaFarmaceutica(\Saba\FarmaciaBundle\Entity\FormaFarmaceutica $formaFarmaceutica = null)
    {
        $this->formaFarmaceutica = $formaFarmaceutica;

        return $this;
    }

    /**
     * Get formaFarmaceutica
     *
     * @return \Saba\FarmaciaBundle\Entity\FormaFarmaceutica 
     */
    public function getFormaFarmaceutica()
    {
        return $this->formaFarmaceutica;
    }

    /**
     * Set envasePrimario
     *
     * @param \Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento $envasePrimario
     * @return VariacionesDeMedicamento
     */
    public function setEnvasePrimario(\Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento $envasePrimario = null)
    {
        $this->envasePrimario = $envasePrimario;

        return $this;
    }

    /**
     * Get envasePrimario
     *
     * @return \Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento 
     */
    public function getEnvasePrimario()
    {
        return $this->envasePrimario;
    }

    /**
     * Set envaseSecundario
     *
     * @param \Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento $envaseSecundario
     * @return VariacionesDeMedicamento
     */
    public function setEnvaseSecundario(\Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento $envaseSecundario = null)
    {
        $this->envaseSecundario = $envaseSecundario;

        return $this;
    }

    /**
     * Get envaseSecundario
     *
     * @return \Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento 
     */
    public function getEnvaseSecundario()
    {
        return $this->envaseSecundario;
    }

    /**
     * Set envaseAdicional
     *
     * @param \Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento $envaseAdicional
     * @return VariacionesDeMedicamento
     */
    public function setEnvaseAdicional(\Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento $envaseAdicional = null)
    {
        $this->envaseAdicional = $envaseAdicional;

        return $this;
    }

    /**
     * Get envaseAdicional
     *
     * @return \Saba\FarmaciaBundle\Entity\EnvaseDeMedicamento 
     */
    public function getEnvaseAdicional()
    {
        return $this->envaseAdicional;
    }
}
