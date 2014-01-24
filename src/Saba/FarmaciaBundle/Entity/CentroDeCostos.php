<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase CentroDeCostosAdmin
 * CentroDeCostos
 *
 * @ORM\Table(name="centros_de_costos")
 * @ORM\Entity
 */
class CentroDeCostos
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
    private $clave;
    
    /**
     * @ORM\Column(type="string")
     */
    private $descripcion;
    
    /**
     * @ORM\ManytoOne(targetEntity="UnidadResponsableDeCentrosdeCostos")
     */
    private $unidadResponsable;
    
    /**
     * TODO: Obtener la especificación para este atributo.
     * @ORM\Column(type="string")
     */
    private $titular;
    
    /**
     * @ORM\ManyToOne(targetEntity="RutaDereparto")
     */
    private $rutaDeReparto;
    

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
