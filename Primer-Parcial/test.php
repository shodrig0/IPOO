<?php

include_once('edificio.php');
include_once('inmueble.php');
include_once('persona.php');
include_once('admin.php');
include_once('inquilino.php');

$objAdministrador = new Administrador("DNI",  27432561, "Carlos", "Martinez", 154321233, 566);
$objInquilino1 = new Inquilino("DNI",  12333456, "Pepe", "Suarez", 4456722, true);
$objInquilino2 = new Inquilino("DNI",  12333422, "Pedro", "Suarez", 446678, false);
$objInquilino3 = new Inquilino("DNI", 28765436, "Mariela", "Suarez", 25543562, true);

$colInquilinos = [$objInquilino1, $objInquilino2];

$inmueble1 = new Inmueble("I1", 50000, 1, "local comercial", $objInquilino1);
$inmueble2 = new Inmueble("I2", 50000, 1, "local comercial", null);
$inmueble3 = new Inmueble("I3", 35000, 2, "departamento", $objInquilino2);
$inmueble4 = new Inmueble("I4", 35000, 2, "departamento", null);
$inmueble5 = new Inmueble("I5", 35000, 3, "departamento", null);

$colInmuebles = [$inmueble1, $inmueble2, $inmueble3, $inmueble4, $inmueble5];

$objEdificio = new Edificio("Juab B. Justo 3456", $objAdministrador, $colInmuebles);


if ($objEdificio->registrarAlquilerInmueble("departamento", 550000, $objInquilino3)) {
    echo "\nSe registró\n";
} else {
    echo "\nNo se registró\n";
}

//print_r($objEdificio->darInmueblesDisponibles("departamento", 550000));

$objEdificio->setColInmuebles($colInmuebles, $colInquilinos);

echo "El costo del Edificio es de: " . $objEdificio->calculaCostoEdificio() . "\n";
echo "\n--------------------------------\n";

$texto = "";
foreach ($objEdificio->darInmueblesDisponibles("departamento", 555000) as $inmuebleDisponible) {
    $texto .= "Inmueble disponible: " . "\n" . $inmuebleDisponible;
}
echo $texto . "\n";

echo "\n--------------------------------\n";

echo $inmueble1 . "\n";
echo $inmueble2 . "\n";
echo $inmueble3 . "\n";
echo $inmueble4 . "\n";
echo $inmueble5 . "\n";

echo $objEdificio;
