<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TODO: Crear la clase VarianteDeMedicamento.
 * VariacionesDeMedicamento
 *
 * @ORM\Table(name="variantes_de_articulo")
 * @ORM\Entity
 */
class VarianteDeArticulo
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
    private $nombreComercial;
    
    /**
     * @ORM\Column(type="string")
     */
    private $codigoDeBarras;
    

}
