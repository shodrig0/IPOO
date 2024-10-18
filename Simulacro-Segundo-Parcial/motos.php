<?php

class Moto
{
    private $codigo;
    private $costo;
    private $anioFab;
    private $descrip;
    private $porcIncrAnual;
    private $estado;


    public function __construct($codigo, $costo, $anioFab, $descrip, $porcIncrAnual, $estado)
    {

        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFab = $anioFab;
        $this->descrip = $descrip;
        $this->porcIncrAnual = $porcIncrAnual;
        $this->estado = $estado;
    }

    // get and set del codigo
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    // get and set de costo
    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    // get and set de año de fabricacion
    public function getAnioFab()
    {
        return $this->anioFab;
    }

    public function setAnioFab($anioFab)
    {
        $this->anioFab = $anioFab;
    }

    // get and set de descripcion
    public function getDescrip()
    {
        return $this->descrip;
    }

    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;
    }

    // get and set del incremento anual del porcentaje
    public function getPorcIncrAnual()
    {
        return $this->porcIncrAnual;
    }

    public function setPorcIncrAnual($porcIncrAnual)
    {
        $this->porcIncrAnual = $porcIncrAnual;
    }

    // get and set del estado
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function darPrecioVenta()
    {
        $precioVenta = -1;

        if ($this->getEstado()) {
            $anioActual = date('Y');
            $anioDeFab = $this->getAnioFab();
            $incrementoAnualPorc = $this->getPorcIncrAnual();
            $costoMoto = $this->getCosto();
            $difAnios = $anioActual - $anioDeFab;
            $precioVenta = $costoMoto * (1 + $difAnios * $incrementoAnualPorc / 100);
        }

        return $precioVenta;
    }

    public function __toString()
    {
        $estado = "";
        if ($this->getEstado()) {
            $estado = "Disponible";
        } else {
            $estado = "No disponible";
        }

        $msj = "Código de la moto: " . $this->getCodigo() . "\n";
        $msj .= "Costo de la Moto: " . $this->getCosto() . "\n";
        $msj .= "El año de fabricación: " . $this->getAnioFab() . "\n";
        $msj .= "Descripción: " . $this->getDescrip() . "\n";
        $msj .= "Incremento del Porcentaje anual: " . $this->getPorcIncrAnual() . "%\n";
        $msj .= "Estado: " . $estado . "\n";

        return $msj;
    }
}
