<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase DependenciaAdmin
 * Dependencia
 *
 * @ORM\Table(name="dependencias")
 * @ORM\Entity
 */
class Dependencia
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
     * TODO: Validar la especificación de este campo.
     * @ORM\Column(type="integer")
     */
    private $clave;

    /**
     * @ORM\Column(type="string")
     */
    private $titular;
    
    /**
     * @ORM\Column(type="string")
     */
    private $descripcion;

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
