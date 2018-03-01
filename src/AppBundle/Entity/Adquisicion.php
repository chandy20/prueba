<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adquisiciones
 *
 * @ORM\Table(name="adquisicion")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdquisicionRepository")
 */
class Adquisicion {

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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaEstimada", type="date")
     */
    private $fechaEstimada;

    /**
     * @var string
     *
     * @ORM\Column(name="duracionEstimada", type="string", length=255)
     */
    private $duracionEstimada;

    /**
     * @var string
     *
     * @ORM\Column(name="modalidad", type="string", length=255)
     */
    private $modalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="fuenteRecursos", type="string", length=255)
     */
    private $fuenteRecursos;

    /**
     * @var string
     *
     * @ORM\Column(name="valorEstimado", type="string", length=255)
     */
    private $valorEstimado;

    /**
     * @var string
     *
     * @ORM\Column(name="valorEstimadoVigenciaActual", type="string", length=255)
     */
    private $valorEstimadoVigenciaActual;

    /**
     * @var string
     *
     * @ORM\Column(name="requiereVigenciasFuturas", type="string", length=255)
     */
    private $requiereVigenciasFuturas;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoSolicitudVigenciasFuturas", type="string", length=255)
     */
    private $estadoSolicitudVigenciasFuturas;

    /**
     * @var string
     *
     * @ORM\Column(name="datosContactoResponsable", type="text")
     */
    private $datosContactoResponsable;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set descripcion.
     *
     * @param string $descripcion
     *
     * @return Adquisiciones
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion.
     *
     * @return string
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set fechaEstimada.
     *
     * @param \DateTime $fechaEstimada
     *
     * @return Adquisiciones
     */
    public function setFechaEstimada($fechaEstimada) {
        $this->fechaEstimada = $fechaEstimada;

        return $this;
    }

    /**
     * Get fechaEstimada.
     *
     * @return \DateTime
     */
    public function getFechaEstimada() {
        return $this->fechaEstimada;
    }

    /**
     * Set duracionEstimada.
     *
     * @param string $duracionEstimada
     *
     * @return Adquisiciones
     */
    public function setDuracionEstimada($duracionEstimada) {
        $this->duracionEstimada = $duracionEstimada;

        return $this;
    }

    /**
     * Get duracionEstimada.
     *
     * @return string
     */
    public function getDuracionEstimada() {
        return $this->duracionEstimada;
    }

    /**
     * Set modalidad.
     *
     * @param string $modalidad
     *
     * @return Adquisiciones
     */
    public function setModalidad($modalidad) {
        $this->modalidad = $modalidad;

        return $this;
    }

    /**
     * Get modalidad.
     *
     * @return string
     */
    public function getModalidad() {
        return $this->modalidad;
    }

    /**
     * Set fuenteRecursos.
     *
     * @param string $fuenteRecursos
     *
     * @return Adquisiciones
     */
    public function setFuenteRecursos($fuenteRecursos) {
        $this->fuenteRecursos = $fuenteRecursos;

        return $this;
    }

    /**
     * Get fuenteRecursos.
     *
     * @return string
     */
    public function getFuenteRecursos() {
        return $this->fuenteRecursos;
    }

    /**
     * Set valorEstimado.
     *
     * @param string $valorEstimado
     *
     * @return Adquisiciones
     */
    public function setValorEstimado($valorEstimado) {
        $this->valorEstimado = $valorEstimado;

        return $this;
    }

    /**
     * Get valorEstimado.
     *
     * @return string
     */
    public function getValorEstimado() {
        return $this->valorEstimado;
    }

    /**
     * Set valorEstimadoVigenciaActual.
     *
     * @param string $valorEstimadoVigenciaActual
     *
     * @return Adquisiciones
     */
    public function setValorEstimadoVigenciaActual($valorEstimadoVigenciaActual) {
        $this->valorEstimadoVigenciaActual = $valorEstimadoVigenciaActual;

        return $this;
    }

    /**
     * Get valorEstimadoVigenciaActual.
     *
     * @return string
     */
    public function getValorEstimadoVigenciaActual() {
        return $this->valorEstimadoVigenciaActual;
    }

    /**
     * Set requiereVigenciasFuturas.
     *
     * @param string $requiereVigenciasFuturas
     *
     * @return Adquisiciones
     */
    public function setRequiereVigenciasFuturas($requiereVigenciasFuturas) {
        $this->requiereVigenciasFuturas = $requiereVigenciasFuturas;

        return $this;
    }

    /**
     * Get requiereVigenciasFuturas.
     *
     * @return string
     */
    public function getRequiereVigenciasFuturas() {
        return $this->requiereVigenciasFuturas;
    }

    /**
     * Set estadoSolicitudVigenciasFuturas.
     *
     * @param string $estadoSolicitudVigenciasFuturas
     *
     * @return Adquisiciones
     */
    public function setEstadoSolicitudVigenciasFuturas($estadoSolicitudVigenciasFuturas) {
        $this->estadoSolicitudVigenciasFuturas = $estadoSolicitudVigenciasFuturas;

        return $this;
    }

    /**
     * Get estadoSolicitudVigenciasFuturas.
     *
     * @return string
     */
    public function getEstadoSolicitudVigenciasFuturas() {
        return $this->estadoSolicitudVigenciasFuturas;
    }

    /**
     * Set datosContactoResponsable.
     *
     * @param string $datosContactoResponsable
     *
     * @return Adquisiciones
     */
    public function setDatosContactoResponsable($datosContactoResponsable) {
        $this->datosContactoResponsable = $datosContactoResponsable;

        return $this;
    }

    /**
     * Get datosContactoResponsable.
     *
     * @return string
     */
    public function getDatosContactoResponsable() {
        return $this->datosContactoResponsable;
    }

}
