<?php

class PartidoBasket extends Partido
{
    private $cantInfracciones;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones)
    {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cantInfracciones = $cantInfracciones ?? 0;
    }

    public function getCantInfracciones()
    {
        return $this->cantInfracciones;
    }
    public function setCantInfracciones($cantInfracciones)
    {
        $this->cantInfracciones = $cantInfracciones;
    }

    public function coeficientePartido()
    {
        $penalizacion = $this->getCantInfracciones();
        if ($penalizacion > 0) {
            $totalPenalizacion = ($penalizacion * 0.75);
            parent::setCoefBase(0.5 - $totalPenalizacion);
        }

        $resultado = parent::coeficientePartido();
        return $resultado;
    }

    public function __toString()
    {
        $msj = parent::__toString();
        $msj .= "Cantidad de infracciones: " . $this->getCantInfracciones() . "\n";
        return $msj;
    }
}
