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
     * @return VarianteDeArticulo
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
     * Set codigoDeBarras
     *
     * @param string $codigoDeBarras
     * @return VarianteDeArticulo
     */
    public function setCodigoDeBarras($codigoDeBarras)
    {
        $this->codigoDeBarras = $codigoDeBarras;

        return $this;
    }

    /**
     * Get codigoDeBarras
     *
     * @return string 
     */
    public function getCodigoDeBarras()
    {
        return $this->codigoDeBarras;
    }
}
