<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RutaDeReparto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class RutaDeReparto
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
     *
     * @ORM\Column(type="string")
     */
    private $descipcion;
    
    
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
     * Set descipcion
     *
     * @param string $descipcion
     * @return RutaDeReparto
     */
    public function setDescipcion($descipcion)
    {
        $this->descipcion = $descipcion;

        return $this;
    }

    /**
     * Get descipcion
     *
     * @return string 
     */
    public function getDescipcion()
    {
        return $this->descipcion;
    }
}