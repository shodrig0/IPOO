<?php

class Venta
{
    private $nro;
    private $fecha;
    private $colCliente;
    private $colMoto;
    private $precioFinal;

    public function __construct($nro, $fecha, $colCliente, $colMoto, $precioFinal)
    {

        $this->nro = $nro;
        $this->fecha = $fecha;
        $this->colCliente = $colCliente;
        $this->colMoto = $colMoto;
        $this->precioFinal = $precioFinal;
    }

    public function getNro()
    {
        return $this->nro;
    }

    public function setNro($nro)
    {
        $this->nro = $nro;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getColCliente()
    {
        return $this->colCliente;
    }

    public function setColCliente($colCliente)
    {
        $this->colCliente = $colCliente;
    }

    public function getColMoto()
    {
        return $this->colMoto;
    }

    public function setColMoto($colMoto)
    {
        $this->colMoto = $colMoto;
    }

    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }

    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }

    /*public function arrToStr($col)
    {
        $enum = count($col);
        $listado = "";

        for ($i = 0; $i < $enum; $i++) {
            $string = $col[$i];
            $listado .= $string;
        }
        return $listado;
    }*/

    /**
     * el param es un array, y si es de una de esas clases se llama al toString de esas mismas.
     * si no pertenece a ninguna y es un array, entonces se itera el array y concatenamos los elementos
     */
    public function arrToStr($arr)
    {
        $listado = "";

        if ($arr instanceof MotoImportada || $arr instanceof Cliente) {
            $listado = $arr->__toString();
        } elseif (is_array($arr)) {
            $enum = count($arr);
            for ($i = 0; $i < $enum; $i++) {
                $listado .= $arr[$i];
            }
        }
        return $listado;
    }

    public function incorporarMoto($objMoto)
    {
        if ($objMoto->getEstado()) {
            if ($objMoto->darPrecioVenta() > 0) {
                $this->getColMoto()[] = $objMoto;
                $suma = $objMoto->getCosto() + $this->getPrecioFinal();
                $this->setPrecioFinal($suma);
            }
        }
    }

    public function retornarTotalVentaNacional()
    {
        $montoTotal = 0;
        $colMoto = $this->getColMoto();

        foreach ($colMoto as $objMoto) {
            $objMoto->setEstado(true);
            $precioObjMoto = $objMoto->darPrecioVenta();
            if ($objMoto instanceof MotoNacional && $precioObjMoto != -1) {
                $montoTotal += $precioObjMoto;
            }
            $objMoto->setEstado(false);
        }
        return $montoTotal;
    }

    public function contieneMotoImportada()
    {
        $esImportada = false;
        $colMoto = $this->getColMoto();
        $i = 0;
        $enum = count($colMoto);

        while ($i < $enum && !$esImportada) {
            if ($colMoto[$i] instanceof MotoImportada) {
                $esImportada = true;
            }
            $i++;
        }

        return $esImportada;
    }

    public function retornarMotosImportadas()
    {
        $arrMotosImp = [];
        $colMoto = $this->getColMoto();

        foreach ($colMoto as $objMoto) {
            if ($objMoto instanceof MotoImportada) {
                $arrMotosImp[] = $objMoto;
            }
        }
        return $arrMotosImp;
    }

    public function __toString()
    {
        $msj = "Número: " . $this->getNro() . "\n";
        $msj .= "Fecha: " . $this->getFecha() . "\n";
        $msj .= "Listado de Clientes: " . $this->arrToStr($this->getColCliente()) . "\n";
        $msj .= "Listado de Motos: " . $this->arrToStr($this->getColMoto()) . "\n";
        $msj .= "Precio final: " . $this->getPrecioFinal() . "\n";
        return $msj;
    }
}
