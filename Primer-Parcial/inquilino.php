<?php

class Inquilino extends Persona
{
    private $EstCivil;

    public function __construct($tDoc, $nDoc, $nomb, $apell, $nTel, $EstCivil)
    {
        parent::__construct($tDoc, $nDoc, $nomb, $apell, $nTel);
        $this->EstCivil = $EstCivil;
    }

    public function getEstCivil()
    {
        return $this->EstCivil;
    }

    public function setEstCivil($EstCivil)
    {
        $this->EstCivil = $EstCivil;
    }

    public function __toString()
    {
        $estado = "";
        if ($this->getEstCivil()) {
            $estado = "Casado/Convivencia";
        } else {
            $estado = "Soltero/Viudo";
        }

        $msj = parent::__toString() . "\n";
        $msj .= "Estado Civil: " . $estado . "\n";
        return $msj;
    }
}
