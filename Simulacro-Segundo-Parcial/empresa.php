<?php


class Empresa
{
    private $denominacion;
    private $direccion;
    private $colCliente;
    private $colMoto;
    private $colVentas = [];

    public function __construct($denominacion, $direccion, $colCliente, $colMoto, $colVentas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colCliente = $colCliente;
        $this->colMoto = $colMoto;
        $this->colVentas = $colVentas;
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
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

    public function getColVentas()
    {
        return $this->colVentas;
    }

    public function setColVentas($colVentas)
    {
        $this->colVentas = $colVentas;
    }

    public function retornarMoto($codigoMoto)
    {
        $i = 0;
        $motoEnLista = null;
        $nroMotos = count($this->getColMoto());
        while ($i < $nroMotos && $motoEnLista === null) {
            $moto = $this->getColMoto()[$i];
            if ($moto->getCodigo() == $codigoMoto) {
                $motoEnLista = $moto;
            }
            $i++;
        }
        return $motoEnLista;
    }

    /*public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $impFinal = 0;
        $venta = null; // bandera de nulo
        $colVentas[] = $this->getColVentas();
        foreach ($colCodigosMoto as $codigoMoto) {
            $objMotoCod = $this->retornarMoto($codigoMoto);
            if ($objMotoCod !== null && $objMotoCod->getEstado() && $objCliente->getEstado()) {
                if ($venta === null) { // acá agrego!! si es igual a null que cree
                    $venta = new Venta(null, date('Y-m-d'), $objCliente, $objMotoCod, $objMotoCod->darPrecioVenta());
                    $objMotoCod->setEstado(false);
                }
                $impFinal += $objMotoCod->darPrecioVenta();
            }
        }
        array_push($colVentas, $venta);
        // modifico el array solo si hay una venta
        if ($venta !== null) {
            $this->setObjVentas($colVentas);
        }
        return $impFinal;
    }*/

    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $importeFinal = 0;
        $coleccionVentas = $this->getColVentas();
        $coleccionMotos = [];
        foreach ($colCodigosMoto as $codigo) {
            $objMotoCodigoIgual = $this->retornarMoto($codigo);
            if ($objMotoCodigoIgual != null && $objMotoCodigoIgual->getEstado() != false && $objCliente->getEstado() != false) {
                $coleccionMotos[] = $objMotoCodigoIgual;
                $importeFinal += $objMotoCodigoIgual->darPrecioVenta();
                $objMotoCodigoIgual->setEstado(false);
            }
        }
        if ($importeFinal > 0) {
            array_push($coleccionVentas, new Venta(count($coleccionVentas), date('Y-m-d'), $objCliente, $coleccionMotos, $importeFinal));
        }
        $this->setColVentas($coleccionVentas);
        return $importeFinal;
    }

    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $ventasCliente = [];
        $numVentas = count($this->getColVentas());
        $i = 0;
        while ($i < $numVentas) {
            $venta = $this->getColVentas()[$i];
            if ($venta->getColCliente()->getTipo() == $tipo && $venta->getColCliente()->getNroDoc() == $numDoc) {
                $ventasCliente[] = $venta;
            }
            $i++;
        }
        return $ventasCliente;
    }

    public function informarSumaVentasNacionales()
    {
        $montoTotal = 0;
        $colVentas = $this->getColVentas();
        foreach ($colVentas as $objVenta) {
            $list = $objVenta->retornarTotalVentaNacional();
            $montoTotal += $list;
        }
        return $montoTotal;
    }

    public function informarVentasImportadas()
    {
        $ventasImportadas = [];
        $colVentas = $this->getColVentas();
        $i = 0;
        $enum = count($colVentas);

        while ($i < $enum) {
            $objVenta = $colVentas[$i];
            if ($objVenta->contieneMotoImportada()) {
                $ventasImportadas[] = $objVenta;
            }
            $i++;
        }

        return $ventasImportadas;
    }

    public function arrToStr($col)
    {
        $enum = count($col);
        $listado = "";

        for ($i = 0; $i < $enum; $i++) {
            $string = $col[$i];
            $listado .= $string;
        }
        return $listado;
    }

    public function __toString()
    {
        $msj = "\nDatos Empresa:\n";
        $msj .= "Denominación: " . $this->getDenominacion() . "\n";
        $msj .= "Direccion: " . $this->getDireccion() . "\n";
        $msj .= "Lista Clientes: " . $this->arrToStr($this->getColCliente()) . "\n";
        $msj .= "Lista de Motos: " . $this->arrToStr($this->getColMoto()) . "\n";
        $msj .= "Lista de Ventas: " . $this->arrToStr($this->getColVentas());
        return $msj;
    }
}
