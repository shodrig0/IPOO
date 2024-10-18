<?php

class MotoImportada extends Moto
{
    private $paisOrigen;
    private $impuestoImport;

    public function __construct($codigo, $costo, $anioFab, $descrip, $porcIncrAnual, $estado, $paisOrigen, $impuestoImport)
    {
        parent::__construct($codigo, $costo, $anioFab, $descrip, $porcIncrAnual, $estado);
        $this->paisOrigen = $paisOrigen;
        $this->impuestoImport = $impuestoImport;
    }

    // get and set de impuesto por importacion
    public function getImpuestoImport()
    {
        return $this->impuestoImport;
    }

    public function setImpuestoImport($impuestoImport)
    {
        $this->impuestoImport = $impuestoImport;
    }

    // get and set de pais origen
    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }

    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        $impuestoDeImp = $this->getImpuestoImport();
        $precioImportado = 0;

        if ($precioVenta > 0) {
            $precioImportado = $precioVenta * (1 + $impuestoDeImp / 100);
        } else {
            $precioImportado = $precioVenta;
        }
        return $precioImportado;
    }

    public function __toString()
    {
        $msj = parent::__toString() . "\n";
        $msj .= "País de orígen: " . $this->getPaisOrigen() . "\n";
        $msj .= "Impuesto por importación de: " . $this->getImpuestoImport() . "%\n";
        return $msj;
    }
}
