<?php

class Moto
{

    // atributos
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigoM, $costoM, $anioFabricacionM, $descripcionM, $porcentajeIncrementoAnualM, $activaM)
    {
        $this->codigo = $codigoM;
        $this->costo = $costoM;
        $this->anioFabricacion = $anioFabricacionM;
        $this->descripcion = $descripcionM;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnualM;
        $this->activa = $activaM;
    }

    /**
     * get y set de codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigoM)
    {
        $this->codigo = $codigoM;
    }

    /**
     * get y set de costo
     */
    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costoM)
    {
        $this->costo = $costoM;
    }

    /**
     * get y set de año fabricacion
     */
    public function getAnioFabricacion()
    {
        return $this->anioFabricacion;
    }

    public function setAnioFabricacion($anioFabricacionM)
    {
        $this->anioFabricacion = $anioFabricacionM;
    }

    /**
     * get y set de descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcionM)
    {
        $this->descripcion = $descripcionM;
    }

    /**
     * get y set de porcentaje incremento anual
     */
    public function getPorcentajeIncrementoAnual()
    {
        return $this->porcentajeIncrementoAnual;
    }

    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnualM)
    {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnualM;

        return $this;
    }

    /**
     * get y set de activa
     */
    public function getActiva()
    {
        return $this->activa;
    }

    public function setActiva($activaM)
    {
        $this->activa = $activaM;

        return $this;
    }

    // precio venta
    public function darPrecioVenta()
    {
        $precioVenta = -1;

        if ($this->getActiva()) {
            $anioActual = date("Y"); // obtengo el año
            $aniosTotales = $anioActual - $this->getAnioFabricacion();
            $precioVenta = $this->getCosto() * (1 + $aniosTotales * $this->getPorcentajeIncrementoAnual() / 100); // op
        }

        return $precioVenta;
    }

    public function __toString()
    {
        // para que no aparezca un 0 o un 1
        $estado = "";
        if ($this->getActiva()) {
            $estado = "Activo";
        } else {
            $estado = "Inactiva";
        }

        return "\nCodigo moto: " . $this->getCodigo() . "\nCosto de la moto: " . $this->getCosto() . "\nAño de fabricacion: " . $this->getAnioFabricacion() . "\nPorcentaje incremento anual: " . $this->getPorcentajeIncrementoAnual() . "\nEstado de la moto: " . $estado;
    }
}
