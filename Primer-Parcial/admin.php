<?php

class Administrador extends Persona
{
    private $licencia;

    public function __construct($tDoc, $nDoc, $nomb, $apell, $nTel, $licencia)
    {
        parent::__construct($tDoc, $nDoc, $nomb, $apell, $nTel);
        $this->licencia = $licencia;
    }

    public function getLicencia()
    {
        return $this->licencia;
    }

    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;
    }

    public function __toString()
    {
        $msj = parent::__toString() . "\n";
        $msj .= "Número de licencia: " . $this->getLicencia() . "\n";
        return $msj;
    }
}
