<?php

class Pasajero
{
    public $nombreP;
    public $apellidoP;
    public $documentoP;
    public $telefonoP;

    public function __construct($nombre, $apellido, $documento, $telefono)
    {
        $this->nombreP = $nombre;
        $this->apellidoP = $apellido;
        $this->documentoP = $documento;
        $this->telefonoP = $telefono;
    }

    /**
     * get y set nombre
     */
    public function getNombre()
    {
        return $this->nombreP;
    }

    public function setNombre($nombre)
    {
        $this->nombreP = $nombre;
    }

    /**
     * get y set apellido
     */
    public function getApellido()
    {
        return $this->apellidoP;
    }

    public function setApellido($apellido)
    {
        $this->apellidoP = $apellido;
    }

    /**
     * get y set numDoc
     */
    public function getNumDoc()
    {
        return $this->documentoP;
    }

    public function setNumDoc($documento)
    {
        $this->documentoP = $documento;
    }

    /**
     * get y set telefono
     */
    public function getTel()
    {
        return $this->telefonoP;
    }

    public function setTel($telefono)
    {
        $this->telefonoP = $telefono;
    }

    // retorno todo en la variable msj
    public function __toString()
    {
        $msj = "\n»»»»««««\n";
        $msj .= "Nombre: " . $this->getNombre() . "\n";
        $msj .= "Apellido: " . $this->getApellido() . "\n";
        $msj .= "DNI: " . $this->getNumDoc() . "\n";
        $msj .= "Teléfono: " . $this->getTel();

        return $msj;
    }
}
