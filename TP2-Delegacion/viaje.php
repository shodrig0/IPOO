<?php

class Viaje
{

    // atributos
    private $codigoDestino;
    private $destino;
    private $cantidadMaxPasajeros;
    private $objPasajero; // array de pasajeros
    private $objResponsableViaje;

    public function __construct($codViaje, $destino, $cantMaxPasajero, ResponsableV $responsable)
    {
        $this->codigoDestino = $codViaje;
        $this->destino = $destino;
        $this->cantidadMaxPasajeros = $cantMaxPasajero;
        $this->objPasajero = [];
        $this->objResponsableViaje = $responsable;
    }

    // getters
    public function getCodViaje()
    {
        return $this->codigoDestino;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getMaxPasajero()
    {
        return $this->cantidadMaxPasajeros;
    }
    public function getObjPasajero()
    {
        return $this->objPasajero;
    }

    public function getObjResponsableViaje()
    {
        return $this->objResponsableViaje;
    }

    //setterss
    public function setCodViaje($codViaje)
    {
        $this->codigoDestino = $codViaje;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function setMaxPasajero($cantMaxPasajero)
    {
        $this->cantidadMaxPasajeros = $cantMaxPasajero;
    }
    public function setObjPasajero($objPasajero)
    {
        $this->objPasajero = $objPasajero;
    }

    public function setObjResponsableViaje($responsable)
    {
        $this->objResponsableViaje = $responsable;
    }

    /**
     * agrego al pasajero
     * si no está y hay espacio, se agrega el pasajero al array
     * @return boolean
     */
    public function agregarPasajero($pasajero)
    {
        $agregado = false;

        if (count($this->getObjPasajero()) < $this->getMaxPasajero()) {
            if (!$this->verificarPasajero($pasajero)) {
                $coleccionP = $this->getObjPasajero();
                $coleccionP[] = $pasajero;
                $this->setObjPasajero($coleccionP); // NO OLVIDARSELO!! 2hs buscando el error
                $agregado = true;
            }
        }
        return $agregado;
    }

    /**
     * valido si existe el pasajero
     * @return boolean
     * recorro array parcial, asi solo llego hasta donde coincidan los datos y no recorro todo sin neceisadad
     */
    public function verificarPasajero($pasajero)
    {
        $pasajeroEnLista = false;
        $numPasajeros = count($this->getObjPasajero());
        $i = 0;

        while ($i < $numPasajeros && !$pasajeroEnLista) {
            $pasajeroLista = $this->getObjPasajero()[$i]; // Pasajero actual en la lista
            if ($pasajeroLista->getNumDoc() == $pasajero->getNumDoc()) { // Comparando el número de documento
                $pasajeroEnLista = true;
            }
            $i++;
        }
        return $pasajeroEnLista;
    }

    /**
     * modificar pasajero
     * @return boolean
     * recorro array parcial
     */
    public function modificarPasajero($pasajeroAModificar)
    {
        $pasajeroEnListaEncontrado = false;
        $i = 0;
        $coleccionP = $this->getObjPasajero();
        $cantPasajeros = count($this->getObjPasajero());

        while ($i < $cantPasajeros && !$pasajeroEnListaEncontrado) {
            $pasajeroLista = $coleccionP[$i];
            if ($pasajeroLista->getNumDoc() == $pasajeroAModificar->getNumDoc()) {
                $pasajeroLista->setNombre($pasajeroAModificar->getNombre());
                $pasajeroLista->setApellido($pasajeroAModificar->getApellido());
                $pasajeroLista->setTel($pasajeroAModificar->getTel());
                $pasajeroEnListaEncontrado = true;
            }
            $i++;
        }
        return $pasajeroEnListaEncontrado;
    }

    /**
     * moodificar responsable
     * @return boolean
     */
    public function modificarResponsable($numAModificar, $responsableAModificar)
    {
        $responsableEncontrado = false;
        $responsable = $this->getObjResponsableViaje();

        if ($responsable->getNumEmpleado() == $numAModificar || $responsable->getNumLicencia() == $numAModificar) { // Comparo que siempre cumpla al menos una condicion. De esa manera puede ingresar Licencia o Empleado y compararlo.
            // luego aca modifico absolutamente todos los datos, ya que si el nombre cambia, la numLicencia&&numEmpleado tambien.
            $responsable->setNumEmpleado($responsableAModificar->getNumEmpleado());
            $responsable->setNumLicencia($responsableAModificar->getNumLicencia());
            $responsable->setNombreEmpleado($responsableAModificar->getNombreEmpleado());
            $responsable->setApellidoEmpleado($responsableAModificar->getApellidoEmpleado());
            $responsableEncontrado = true;
        }
        return $responsableEncontrado;
    }

    /**
     * Concateno el listado de los pasajeros
     * @return lista
     */
    public function listadoPasajeros()
    {
        $col = $this->getObjPasajero(); // no paso por parametro esto lo obtengo aca
        $enum = count($col);
        $listado = "";

        for ($i = 0; $i < $enum; $i++) {
            $pasajeros = $col[$i];
            $listado .= $pasajeros . "\n";
        }
        return $listado;
    }

    public function __toString()
    {
        $msj = "Codigo:  " . $this->getCodViaje() . "\n";
        $msj .= "--------\n";
        $msj .= "Destino: " . $this->getDestino() . "\n";
        $msj .= "--------\n";
        $msj .= "Capacidad máxima de Pasajeros: " . $this->getMaxPasajero() . "\n";
        $msj .= "--------\n";
        $msj .= "Responsable del viaje: " . $this->getObjResponsableViaje() . "\n";
        $msj .= "--------\n";
        $msj .= "Lista Pasajeros:" . $this->listadoPasajeros() . "\n";
        return $msj;
    }
}
