<?php
class Persona
{
    private $tipoDoc;
    private $numeroDoc;
    private $nombre;
    private $apellido;
    private $numeroContacto;

    public function __construct($tDoc, $nDoc, $nomb, $apell, $nTel)
    {
        $this->tipoDoc = $tDoc;
        $this->numeroDoc = $nDoc;
        $this->nombre = $nomb;
        $this->apellido = $apell;
        $this->numeroContacto = $nTel;
    }

    //OBSERVADORES
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    public function getNumeroDoc()
    {
        return $this->numeroDoc;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getNumeroTel()
    {
        return $this->numeroContacto;
    }

    //MODIFICADORES
    public function setTipoDoc($tD)
    {
        $this->tipoDoc = $tD;
    }

    public function setNumeroDoc($nD)
    {
        $this->numeroDoc = $nD;
    }

    public function setNombre($n)
    {
        $this->nombre = $n;
    }

    public function setApellido($a)
    {
        $this->apellido = $a;
    }

    public function setNumeroTel($nC)
    {
        $this->numeroContacto = $nC;
    }

    public function __toString()
    {
        $msj = "\nNombre: " . $this->getNombre() . "\n";
        $msj .= "Apellido: " . $this->getApellido() . "\n";
        $msj .= "Tipo y Numero de Documento: " . $this->getTipoDoc() . ": " . $this->getNumeroDoc() . "\n";
        $msj .= "Número de Telefono: " . $this->getNumeroTel();

        return $msj;
    }
}
