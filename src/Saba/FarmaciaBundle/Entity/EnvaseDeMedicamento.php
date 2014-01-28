<?php

namespace Saba\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnvaseDeMedicamento
 *
 * @ORM\Table(name="envases_de_medicamento")
 * @ORM\Entity
 */
class EnvaseDeMedicamento
{
    /**
     * TODO: Crear la clase envase de medicamento
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $nombre;


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
     * Set nombre
     *
     * @param string $nombre
     * @return EnvaseDeMedicamento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}
