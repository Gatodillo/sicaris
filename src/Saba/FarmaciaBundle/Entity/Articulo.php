<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Articulo
 *
 * @ORM\Table(name="articulos")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discriminador", type="string")
 * @ORM\DiscriminatorMap({"articulo" = "Articulo", "medicamento"="Medicamento"})
 * @ORM\Entity
 */
class Articulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="nombre_generico", type="string", length=50)
     */
    private $nombreGenerico;
    
    /**
     *
     * @ORM\Column(type="string")
     */
    private $descripcion;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadDeMedida")
     * @ORM\JoinColumn(name="unidad_de_medida_id")
     */
    private $unidadDeMedida;

    /**
     * @ORM\Column(name="esta_activo", type="boolean")
     */
    private $estaActivo;
    
    public function __toString() {
        return $this->getNombreGenerico() . "  " . $this->getDescripcion() ?: "";
    }
}
