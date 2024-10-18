<?php

class Cliente
{
    // atributos
    private $nombre;
    private $apellido;
    private $estado;
    private $tipo;
    private $nroDoc;

    public function __construct($nombreC, $apellidoC, $estadoC, $tipoC, $nroDocC)
    {
        $this->nombre = $nombreC;
        $this->apellido = $apellidoC;
        $this->estado = $estadoC;
        $this->tipo = $tipoC;
        $this->nroDoc = $nroDocC;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombreC)
    {
        $this->nombre = $nombreC;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellidoC)
    {
        $this->apellido = $apellidoC;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estadoC)
    {
        $this->estado = $estadoC;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipoC)
    {
        $this->tipo = $tipoC;
    }

    public function getNroDoc()
    {
        return $this->nroDoc;
    }

    public function setNroDoc($nroDocC)
    {
        $this->nroDoc = $nroDocC;
    }

    public function __toString()
    {
        // para que no aparezca un 0 o un 1
        $estado = "";
        if ($this->getEstado()) {
            $estado = "Activo";
        } else {
            $estado = "Inactivo";
        }

        $msj = "\nNombre y Apellido: " . $this->getNombre() . " " . $this->getApellido() . "\n";
        $msj .= "Estado: " . $estado . "\n";
        $msj .= "Tipo de Documentación: " . $this->getTipo() . "\n";
        $msj .= "Número de Documento: " . $this->getNroDoc() . "\n";

        return $msj;
    }
}
