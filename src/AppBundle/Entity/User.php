<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=255)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

 

    public function __toString() {
        return $this->getNombres() ? $this->getNombres() + " " + $this->getApellidos() : "";
    }

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * Set nombres.
     *
     * @param string $nombres
     *
     * @return User
     */
    public function setNombres($nombres) {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres.
     *
     * @return string
     */
    public function getNombres() {
        return $this->nombres;
    }

    /**
     * Set apellidos.
     *
     * @param string $apellidos
     *
     * @return User
     */
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos.
     *
     * @return string
     */
    public function getApellidos() {
        return $this->apellidos;
    }

    /**
     * Set telefono.
     *
     * @param string $telefono
     *
     * @return User
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono.
     *
     * @return string
     */
    public function getTelefono() {
        return $this->telefono;
    }

}
