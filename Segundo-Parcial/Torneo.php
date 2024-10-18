<?php

class Torneo
{
    private $colPartidos = [];
    private $importePremio;

    public function __construct($colPartidos, $importePremio)
    {
        $this->colPartidos = $colPartidos;
        $this->importePremio = $importePremio;
    }

    //getters
    public function getColPartidos()
    {
        return $this->colPartidos;
    }

    public function getImportePremio()
    {
        return $this->importePremio;
    }

    //setters
    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }

    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }

    //metodos
    public function listadoPartidos()
    {
        $listado = "";
        foreach ($this->getColPartidos() as $partido) {
            $listado .= $partido . "\n";
        }
        return $listado;
    }


    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido)
    {
        $objPartido = null;
        $idpartido = count($this->getColPartidos());
        if ($objEquipo1->getObjCategoria() == $objEquipo2->getObjCategoria() && $objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores()) {
            if ($tipoPartido == 'futbol') {
                $objPartido = new PartidoFutbol($idpartido, $fecha, $objEquipo1, 0, $objEquipo2, 0);
                $coleccionPartidos[] = $this->getColPartidos();
                array_push($coleccionPartidos, $objPartido);
                $this->setColPartidos($coleccionPartidos);
            } else if ($tipoPartido == 'basquet') {
                $objPartido = new PartidoBasket($idpartido, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0);
                $coleccionPartidos[] = $this->getColPartidos();
                array_push($coleccionPartidos, $objPartido);
                $this->setColPartidos($coleccionPartidos);
            }
        }
        return $objPartido;
    }

    private function obtenerPartido($tipoPartido)
    {
        $partidos = array();

        foreach ($this->getColPartidos() as $partido) {
            if (($tipoPartido == "futbol" && $partido instanceof PartidoFutbol) ||
                ($tipoPartido == "basquetol" && $partido instanceof PartidoBasket)
            ) {
                array_push($partidos, $partido);
            }
        }

        return $partidos;
    }

    public function darGanadores($deporte)
    {
        $ganadores = array();
        $partidos = $this->obtenerPartido($deporte);

        foreach ($partidos as $partido) {
            $ganador = $partido->darEquipoGanador();
            $bandera = false;
            for ($i = 0; $i < count($ganadores) && !$bandera; $i++) {
                if ($ganadores[$i] == $ganador) {
                    $bandera = true;
                }
            }
            if (!$bandera) {
                array_push($ganadores, $ganador);
            }
        }

        return $ganadores;
    }

    public function calcularPremioPartido($OBJPartido)
    {
        $equipoGanador = $OBJPartido->darEquipoGanador();
        $premioPartido = $OBJPartido->getCoefBase() * $this->getImportePremio();

        $resultado = array(
            'equipoGanador' => $equipoGanador,
            'premioPartido' => $premioPartido
        );

        return $resultado;
    }

    public function __toString()
    {
        $msj = "Partidos: " . $this->listadoPartidos() . "\n";
        $msj .= "Importe Premio: " . $this->getImportePremio() . "\n";
        return $msj;
    }
}
