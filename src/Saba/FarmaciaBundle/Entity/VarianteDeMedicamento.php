<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase VarianteDeMedicamento.
 * VariacionesDeMedicamento
 *
 * @ORM\Table(name="variantes_de_medicamento")
 * @ORM\Entity
 */
class VarianteDeMedicamento extends VarianteDeArticulo
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
     * @ORM\ManyToOne(targetEntity="Medicamento", inversedBy="variantes")
     */
    protected $medicamento;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $nombreComercial;
    
    /**
     * @ORM\ManyToOne(targetEntity="FormaFarmaceutica")
     * @ORM\JoinColumn(name="forma_farmaceutica_id")
     */
    protected $formaFarmaceutica;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $concentracion;
    
    /**
     * TODO: Catálogo de unidades del SI.
     * @ORM\Column(type="string", name="unidad_internacional")
     */
    protected $unidadInternacional;
    
    /**
     * TODO: Crear entidad EnvaseDeMedicamento y relacionarlas.
     * @ORM\ManyToOne(targetEntity="EnvaseDeMedicamento")
     * @ORM\JoinColumn(name="envase_primario_de_medicamento_id",nullable=true)
     */
    protected $envasePrimario;
    
    /**
     * @ORM\ManyToOne(targetEntity="EnvaseDeMedicamento")
      @ORM\JoinColumn(name="envase_secundario_de_medicamento_id",nullable=true)
     */
    protected $envaseSecundario;
    
    /**
     * @ORM\ManyToOne(targetEntity="EnvaseDeMedicamento")
     * @ORM\JoinColumn(name="envase_adicional_de_medicamento_id",nullable=true)
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
     * Set concentracion
     *
     * @param integer $concentracion
     * @return VarianteDeMedicamento
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
     * @return VarianteDeMedicamento
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
     * @return VarianteDeMedicamento
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
     * @return VarianteDeMedicamento
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
     * @return VarianteDeMedicamento
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
     * @return VarianteDeMedicamento
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
    
    public function __toString() {
        return $this->getNombreComercial() ?: "";
    }

    /**
     * Set nombreComercial
     *
     * @param string $nombreComercial
     * @return VarianteDeMedicamento
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
     * Set medicamento
     *
     * @param \Saba\FarmaciaBundle\Entity\Medicamento $medicamento
     * @return VarianteDeMedicamento
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
