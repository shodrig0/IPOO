<?php

class Cliente
{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipo;
    private $nroDoc;

    public function __construct($nombre, $apellido, $estado, $tipo, $nroDoc)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipo = $tipo;
        $this->nroDoc = $nroDoc;
    }

    //getters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getNroDoc()
    {
        return $this->nroDoc;
    }

    //setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function setNroDoc($nroDoc)
    {
        $this->nroDoc = $nroDoc;
    }

    public function __toString()
    {
        $estado = "";
        if ($this->getEstado()) {
            $estado = "Activo";
        } else {
            $estado = "Inactivo";
        }

        $msj = "\nNombre: " . $this->getNombre() . "\n";
        $msj .= "Apellido: " . $this->getApellido() . "\n";
        $msj .= "Estado: " . $estado . "\n";
        $msj .= "Tipo: " . $this->getTipo() . "\n";
        $msj .= "NroDoc: " . $this->getNroDoc() . "\n";
        return $msj;
    }
}
