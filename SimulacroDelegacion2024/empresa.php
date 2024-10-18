<?php

class Empresa
{

    //atributos
    private $denominacion;
    private $direccion;
    private $colCliente;
    private $colMoto;
    private $objVentas = [];

    public function __construct($denominacion, $direccion, $colCliente, $colMoto, $objVentas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colCliente = $colCliente;
        $this->colMoto = $colMoto;
        $this->objVentas = $objVentas;
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

    public function getObjVentas()
    {
        return $this->objVentas;
    }

    public function setObjVentas($objVentas)
    {
        $this->objVentas = $objVentas;
    }

    // retorno un objeto
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

    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $impFinal = 0;
        $venta = null; // bandera de nulo
        foreach ($colCodigosMoto as $codigoMoto) {
            $objMotoCod = $this->retornarMoto($codigoMoto);
            if ($objMotoCod !== null && $objMotoCod->getActiva() && $objCliente->getEstado()) {
                if ($venta === null) { // acá agrego!! si es igual a null que cree
                    $venta = new Venta(null, date('Y-m-d'), $objCliente, $objMotoCod, $objMotoCod->darPrecioVenta());
                }
                $this->objVentas[] = $venta;
                $impFinal += $objMotoCod->darPrecioVenta();
            }
        }
        // modifico el array solo si hay una venta
        if ($venta !== null) {
            $this->setObjVentas($this->getObjVentas());
        }
        return $impFinal;
    }

    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $ventasCliente = [];
        $numVentas = count($this->getObjVentas());
        $i = 0;
        while ($i < $numVentas) {
            $venta = $this->getObjVentas()[$i];
            if ($venta->getColCliente()->getTipo() == $tipo && $venta->getColCliente()->getNroDoc() == $numDoc) {
                $ventasCliente[] = $venta;
            }
            $i++;
        }
        return $ventasCliente;
    }

    public function listadoClientes()
    {
        $col = $this->getColCliente();
        $enum = count($col);
        $listado = "";

        for ($i = 0; $i < $enum; $i++) {
            $clientes = $col[$i];
            $listado .= $clientes . "\n";
        }
        return $listado;
    }

    public function listadoMotos()
    {
        $col = $this->getColMoto();
        $enum = count($col);
        $listado = "";

        for ($i = 0; $i < $enum; $i++) {
            $motos = $col[$i];
            $listado .= $motos . "\n";
        }
        return $listado;
    }

    public function listadoVentas()
    {
        $col = $this->getObjVentas();
        $enum = count($col);
        $listado = "";

        for ($i = 0; $i < $enum; $i++) {
            foreach ($col[$i] as $venta) {
                $listado .= $venta . "\n";
            }
        }
        return $listado;
    }

    public function listadoVentasCliente($cliente)
    {
        $ventasCliente = $this->retornarVentasXCliente($cliente->getTipo(), $cliente->getNroDoc()); // obtengo los datos acá invocando al metodo retornar. No puedo usar los get fuera de la clase entonces hago la funcion aca. Concateno
        $listado = null;

        if ($ventasCliente != null) {
            $listado = "";
            foreach ($ventasCliente as $venta) {
                $listado .= $venta . "\n";
            }
        }
        return $listado;
    }

    public function __toString()
    {
        $msj = "\nDatos Empresa:\n";
        $msj .= "Denominación: " . $this->getDenominacion() . "\n";
        $msj .= "Direccion: " . $this->getDireccion() . "\n";
        $msj .= "Lista Clientes: " . $this->listadoClientes() . "\n";
        $msj .= "Lista de Motos: " . $this->listadoMotos() . "\n";
        $msj .= "Lista de Ventas: " . $this->listadoVentas();
        return $msj;
    }
}
