<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entidad
 *
 * @ORM\Table(name="entidad")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EntidadRepository")
 */
class Entidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="paginaWeb", type="string", length=255)
     */
    private $paginaWeb;

    /**
     * @var string
     *
     * @ORM\Column(name="totalPresupuesto", type="string", length=255)
     */
    private $totalPresupuesto;

    /**
     * @var string
     *
     * @ORM\Column(name="limiteMenorCuantia", type="string", length=255)
     */
    private $limiteMenorCuantia;

    /**
     * @var string
     *
     * @ORM\Column(name="limiteMinimaCuantia", type="string", length=255)
     */
    private $limiteMinimaCuantia;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Entidad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion.
     *
     * @param string $direccion
     *
     * @return Entidad
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion.
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono.
     *
     * @param string $telefono
     *
     * @return Entidad
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono.
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set paginaWeb.
     *
     * @param string $paginaWeb
     *
     * @return Entidad
     */
    public function setPaginaWeb($paginaWeb)
    {
        $this->paginaWeb = $paginaWeb;

        return $this;
    }

    /**
     * Get paginaWeb.
     *
     * @return string
     */
    public function getPaginaWeb()
    {
        return $this->paginaWeb;
    }

    /**
     * Set totalPresupuesto.
     *
     * @param string $totalPresupuesto
     *
     * @return Entidad
     */
    public function setTotalPresupuesto($totalPresupuesto)
    {
        $this->totalPresupuesto = $totalPresupuesto;

        return $this;
    }

    /**
     * Get totalPresupuesto.
     *
     * @return string
     */
    public function getTotalPresupuesto()
    {
        return $this->totalPresupuesto;
    }

    /**
     * Set limiteMenorCuantia.
     *
     * @param string $limiteMenorCuantia
     *
     * @return Entidad
     */
    public function setLimiteMenorCuantia($limiteMenorCuantia)
    {
        $this->limiteMenorCuantia = $limiteMenorCuantia;

        return $this;
    }

    /**
     * Get limiteMenorCuantia.
     *
     * @return string
     */
    public function getLimiteMenorCuantia()
    {
        return $this->limiteMenorCuantia;
    }

    /**
     * Set limiteMinimaCuantia.
     *
     * @param string $limiteMinimaCuantia
     *
     * @return Entidad
     */
    public function setLimiteMinimaCuantia($limiteMinimaCuantia)
    {
        $this->limiteMinimaCuantia = $limiteMinimaCuantia;

        return $this;
    }

    /**
     * Get limiteMinimaCuantia.
     *
     * @return string
     */
    public function getLimiteMinimaCuantia()
    {
        return $this->limiteMinimaCuantia;
    }
}
