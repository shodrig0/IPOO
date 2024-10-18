<?php

class Edificio
{

    private $direccion;
    private $objAdministrador;
    private $objInmuebles;

    public function __construct($direccion, $objAdministrador, $objInmuebles)
    {

        $this->direccion = $direccion;
        $this->objAdministrador = $objAdministrador;
        $this->objInmuebles = $objInmuebles;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getObjadministrador()
    {
        return $this->objAdministrador;
    }

    public function setEncargado($objAdministrador)
    {
        $this->objAdministrador = $objAdministrador;
    }

    public function getColInmueble()
    {
        return $this->objInmuebles;
    }

    public function setColInmuebles($objInmueble)
    {
        $this->objInmuebles = $objInmueble;
    }

    private function listadoInmuebles()
    {
        $listado = "";
        $inmuebles = $this->getColInmueble();
        foreach ($inmuebles as $inmueble) {
            $listado .= "Código: " . $inmueble->getCodigo() . ", Piso: " . $inmueble->getPiso() . ", Tipo: " . $inmueble->getTipo() . "\n";
        }
        return $listado;
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

    public function darInmueblesDisponibles($tipoUso, $costoMaximo)
    {
        $colInmDisp = [];
        foreach ($this->getColinmueble() as $inmueble) {
            if ($inmueble->estaDisponible($tipoUso, $costoMaximo)) {
                $colInmDisp[] = $inmueble;
            }
        }
        return $colInmDisp;
    }

    public function buscarInmueble($obj)
    {
        $i = 0;
        $enum = count($this->getColInmueble());
        $bandera = -1;

        while ($i < $enum && $bandera == -1) {
            $inmueble = $this->getColInmueble()[$i];
            if ($inmueble == $obj) {
                $bandera = $i;
            }
            $i++;
        }

        return $bandera;
    }

    public function calculaCostoEdificio()
    {
        $costo = 0;
        foreach ($this->getColInmueble() as $inmueble) {
            if ($inmueble->getObjInquilino() != null) {
                $costo += $inmueble->getCostoMensual();
            }
        }
        return $costo;
    }

    /*public function registrarAlquilerInmueble($tipoUso, $costoMaximo, $objPersona)
    {
        $inmPisoChico = null;
        $estado = false;
        $colInmueblesDisp = $this->darInmueblesDisponibles($tipoUso, $costoMaximo);

        foreach ($colInmueblesDisp as $inmueble) {
            if ($inmPisoChico == null || $inmPisoChico->getPiso() > $inmueble->getPiso()) {
                $inmPisoChico = $inmueble;
            }
        }

        if ($inmPisoChico !== null) {
            $estado = $inmPisoChico->alquilar($objPersona); // pasa a true en caso de que esté disponible, y se lo alquilo
        }

        return $estado;
    }*/

    public function registrarAlquilerInmueble($tipoUso, $costoMaximo, $objPersona)
    {
        $inmPisoChico = null;
        $estado = false;
        $colInmueblesDisp = $this->darInmueblesDisponibles($tipoUso, $costoMaximo);

        foreach ($colInmueblesDisp as $inmueble) {
            if ($inmPisoChico == null || $inmPisoChico->getPiso() > $inmueble->getPiso()) {
                $inmPisoChico = $inmueble;
            }
        }

        if ($this->buscarInmueble($inmPisoChico) != -1) {
            $estado = $inmPisoChico->alquilar($objPersona);
        }

        return $estado;
    }


    public function __toString()
    {
        $msj = "Dirección: " . $this->getDireccion() . "\n";
        $msj .= "Administrador: " . $this->getObjadministrador() . "\n";
        $msj .= "Inmuebles:\n" . $this->listadoInmuebles();
        return $msj;
    }
}
