<?php

include 'pasajeros.php';
include 'responsablesV.php';
include 'viaje.php';

$responsable = new ResponsableV(5654, 2112, "Rodrigo", "Villablanca");

$viajecito = new Viaje(13, "Vista Alegre", 2, $responsable); // inicializo la capacidad en bajito para probar el limite

echo "Bienvenido a Viaje Feliz!\n";
echo "»»»»»»»»»»»»«««««««««««««";

do {
    echo "\n1)Agregar pasajero\n";
    echo "2)Modificar los datos de un pasajero\n";
    echo "3)Modificar los datos del responsable\n";
    echo "4)Ver detalles del viaje\n";
    echo "5)Salir\n";
    echo "Seleccione una opción:\n";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:
            echo "Nombre del pasajero:\n";
            $nombre = trim(fgets(STDIN));
            echo "Apellido del pasajero:\n";
            $apellido = trim(fgets(STDIN));
            echo "Documento del pasajero:\n";
            $documento = trim(fgets(STDIN));
            echo "Teléfono del pasajero:\n";
            $telefono = trim(fgets(STDIN));
            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
            if ($viajecito->agregarPasajero($pasajero)) {
                echo "Listo! Pasajero agregado\n";
            } else {
                echo "El pasajero ya se encuentra en el sistema o ya no quedan lugares disponibles!\n";
            }
            break;
        case 2:
            echo "Ingrese el DNI del pasajero a modificar:\n";
            $documentoModificar = trim(fgets(STDIN));
            echo "Ingrese el nombre:\n";
            $nombreNuevo = trim(fgets(STDIN));
            echo "Ahora el apellido:\n";
            $apellidoNuevo = trim(fgets(STDIN));
            echo "Y por último el telefono:\n";
            $telefonoNuevo = trim(fgets(STDIN));
            $pasajeroNuevo = new Pasajero($nombreNuevo, $apellidoNuevo, $documentoModificar, $telefonoNuevo);
            if ($viajecito->modificarPasajero($pasajeroNuevo)) {
                echo "Enhorabuena!! Los datos fueron modificados\n";
            } else {
                echo "El pasajero con documento $documentoModificar no se encuentra en el sistema!\n";
            }
            break;
        case 3:
            echo "Ingrese el Número de Empleado o el Número de Licencia del Responsable:\n";
            $numAModificar = trim(fgets(STDIN));
            echo "Ingrese el nombre:\n";
            $nombreResponNuevo = trim(fgets(STDIN));
            echo "Ahora el apellido:\n";
            $apellidoResponNuevo = trim(fgets(STDIN));
            echo "Ingrese el nuevo Número de Empleado:\n";
            $nuevoNumEmpleado = trim(fgets(STDIN));
            echo "Ingrese el nuevo Número de Licencia:\n";
            $nuevoNumLicencia = trim(fgets(STDIN));
            $responsableNuevo = new ResponsableV($nuevoNumEmpleado, $nuevoNumLicencia, $nombreResponNuevo, $apellidoResponNuevo);
            if ($viajecito->modificarResponsable($numAModificar, $responsableNuevo)) {
                echo "Modificaste los datos del Responsable exitosamente!\n";
            } else {
                echo "El $numAModificar no pertenece a ningún Responsable\n";
            }
            break;
        case 4:
            echo $viajecito;
            break;
        case 5:
            echo "Adiós!";
            break;
        default:
            echo "Opción inválida\n";
    }
} while ($opcion != 5);
