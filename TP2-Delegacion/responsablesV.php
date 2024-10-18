<?php

class ResponsableV
{

    // atirbutos
    private $numEmpleado;
    private $numLicencia;
    private $nombreEmpleado;
    private $apellidoEmpleado;

    public function __construct($numeroDeEmpleado, $numeroDeLicencia, $nombre, $apellido)
    {
        $this->numEmpleado = $numeroDeEmpleado;
        $this->numLicencia = $numeroDeLicencia;
        $this->nombreEmpleado = $nombre;
        $this->apellidoEmpleado = $apellido;
    }

    public function getApellidoEmpleado()
    {
        return $this->apellidoEmpleado;
    }

    public function setApellidoEmpleado($apellido)
    {
        $this->apellidoEmpleado = $apellido;
    }

    public function getNombreEmpleado()
    {
        return $this->nombreEmpleado;
    }

    public function setNombreEmpleado($nombre)
    {
        $this->nombreEmpleado = $nombre;
    }

    public function getNumLicencia()
    {
        return $this->numLicencia;
    }

    public function setNumLicencia($numeroDeLicencia)
    {
        $this->numLicencia = $numeroDeLicencia;
    }

    public function getNumEmpleado()
    {
        return $this->numEmpleado;
    }

    public function setNumEmpleado($numeroDeEmpleado)
    {
        $this->numEmpleado = $numeroDeEmpleado;
    }

    public function __toString()
    {
        return  "\nNúmero de Empleado: " . $this->getNumEmpleado() . "\n" . "Numero de Licencia: " . $this->getNumLicencia() . "\n" . "Nombre: " . $this->getNombreEmpleado() . "\n" . "Apellido: " . $this->getApellidoEmpleado();
    }
}
