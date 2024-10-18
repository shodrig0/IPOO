<?php

class MotoNacional extends Moto
{
    private $descuento;

    public function __construct($codigo, $costo, $anioFab, $descrip, $porcIncrAnual, $estado, $descuento)
    {
        parent::__construct($codigo, $costo, $anioFab, $descrip, $porcIncrAnual, $estado);
        $this->descuento = $descuento;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }

    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        $descuentoPorc = $this->getDescuento();
        $precioNacyPop = 0;

        if ($precioVenta > 0) {
            $precioNacyPop = $precioVenta * (1 - $descuentoPorc / 100);
        }

        return $precioNacyPop;
    }

    public function __toString()
    {
        $msj = parent::__toString() . "\n";
        $msj .= "Descuento: " . $this->getDescuento() . "%\n";
        return $msj;
    }
}
