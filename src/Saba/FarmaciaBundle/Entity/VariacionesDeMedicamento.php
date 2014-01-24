<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VariacionesDeMedicamento
 *
 * @ORM\Table()
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
     * @ORM\Column(type="string")
     */
    protected $nombreComercial;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $codigoDeBarras;
    
    
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
}
