<?php

class Inmueble
{
    private $codigo;
    private $piso;
    private $tipo;
    private $costoMensual;
    private $objInquilino;

    public function __construct($codigo, $costoMensual, $piso, $tipo, $objInquilino)
    {

        $this->codigo = $codigo;
        $this->piso = $piso;
        $this->tipo = $tipo;
        $this->costoMensual = $costoMensual;
        $this->objInquilino = $objInquilino;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getPiso()
    {
        return $this->piso;
    }

    public function setPiso($piso)
    {
        $this->piso = $piso;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getObjInquilino()
    {
        return $this->objInquilino;
    }

    public function setObjInquilino($objInquilino)
    {
        $this->objInquilino = $objInquilino;
    }

    public function getCostoMensual()
    {
        return $this->costoMensual;
    }

    public function setCostoMensual($costoMensual)
    {
        $this->costoMensual = $costoMensual;
    }

    public function alquilar($objInquilino)
    {
        $bandera = false;
        if ($this->getObjInquilino() == null) {
            $this->setObjInquilino($objInquilino);
            $bandera = true;
        }
        return $bandera;
    }

    public function estaDisponible($tipoUso, $montoMaximo)
    {
        $costo = $this->getCostoMensual();
        $tipo = $this->getTipo();
        $posibleInquilino = $this->getObjInquilino();
        $disponible = false;

        if ($posibleInquilino == null) {
            if ($tipoUso == $tipo) {
                if ($costo <= $montoMaximo) {
                    $disponible = true;
                }
            }
        }

        return $disponible;
    }

    /*public function arrToStr($arr)
    {

        $listado = "";

        if ($arr != null) {
            $enum = count($arr);
            for ($i = 0; $i < $enum; $i++) {
                $listado .= $arr[$i] . "\n";
            }
        } /*else {
            $listado = "";
        }
        return $listado;
    }*/

    public function arrToStr($arr)
    {
        $listado = "";

        if ($arr instanceof Persona) {
            $listado = $arr->__toString();
        } elseif (is_array($arr)) {
            $enum = count($arr);
            for ($i = 0; $i < $enum; $i++) {
                $listado .= $arr[$i] . "\n";
            }
        }
        return $listado;
    }

    public function __toString()
    {
        $msj = "Inmueble: " . $this->getCodigo() . "\n";
        $msj .= "Piso: " . $this->getPiso() . "\n";
        $msj .= "Tipo: " . $this->getTipo() . "\n";
        $msj .= "Costo Mensual: " . $this->getCostoMensual() . "\n";
        $msj .= "Inquilino: " . $this->arrToStr($this->getObjInquilino()) . "\n";
        return $msj;
    }
}
