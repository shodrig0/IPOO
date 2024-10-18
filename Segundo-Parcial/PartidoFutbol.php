<?php

class PartidoFutbol extends Partido
{
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2)
    {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
    }

    public function coeficientePartido()
    {
        $coeficiente = parent::coeficientePartido();
        if ($this->getTipoPartido()->getObjCategoria() == "menores") {
            $coeficiente += 0.13;
        } elseif ($this->getTipoPartido()->getObjCategoria() == "juveniles") {
            $coeficiente += 0.5;
        } elseif ($this->getTipoPartido()->getObjCategoria() == "mayores") {
            $coeficiente +=  0.8;
        }

        return $coeficiente;
    }

    public function __toString()
    {
        $msj = parent::__toString();
        return $msj;
    }
}
