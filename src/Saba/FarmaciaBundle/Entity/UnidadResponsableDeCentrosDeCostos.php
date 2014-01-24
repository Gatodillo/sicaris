<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear el clase UnidadResponsableDeCentrosDeCostosAdmin
 * UnidadMedica
 *
 * @ORM\Table(name="unidades_responsables_de_centros_de_costos")
 * @ORM\Entity
 */
class UnidadResponsableDeCentrosDeCostos
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
     * TODO: Validar la especificación de este atributo.
     * Sustituye a "Unidad responsable".
     * @ORM\Column(type="string")
     */
    private $clave;
    
    /**
     * TODO: Validar la especificación de este campo.
     * @ORM\Column(type="string")
     */
    private $titular;
    
    /**
     * 
     * @ORM\Column(type="string")
     */
    private $descripcion;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Dependencia")
     */
    private $dependencia;    

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
