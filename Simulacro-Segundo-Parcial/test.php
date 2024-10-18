<?php

include_once('cliente.php');
include_once('motos.php');
include_once('motoImportada.php');
include_once('motoNacional.php');
include_once('venta.php');
include_once('empresa.php');

$objCliente1 = new Cliente("Leonardo", "Ponzio", true, "DNI", 20617049);
$objCliente2 = new Cliente("Ariel", "Rojas", true, "DNI", 22617049);

$objMoto11 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto12 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto13 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, 15);

$objMoto14 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);

$objEmpresa = new Empresa('alta gama', 'Av Argenetina 123', [$objCliente1, $objCliente2], [$objMoto11, $objMoto12, $objMoto13, $objMoto14], []);

//5
$objEmpresa->registrarVenta([11, 12, 13, 14], $objCliente2);

//6
$objEmpresa->registrarVenta([13, 14], $objCliente2);

//7
$objEmpresa->registrarVenta([14, 2], $objCliente2);

//8 
/**
 * tiene que retornar una venta siempre que haya habido una importada, asi sea que haya una nacional
 * APARECEN COMO "NO DISPONIBLE" PORQUE YA FUERON VENDIDAS, de ser comentado cada registro de venta, como no hay array de ventas, salta       * directo al echo de la empresa y muestra a las motos en estado DISPONIBLE
 */
$listado = "";
foreach ($objEmpresa->informarVentasImportadas() as $venta) {
    $listado .= $venta . "\n";
}
echo $listado . "\n";

//9
echo "La suma de las ventas de Motos Nacionales: " . $objEmpresa->informarSumaVentasNacionales() . "\n";

echo "\n**************************\n";

//10
echo $objEmpresa;

// testeo
/*echo $objMoto11->darPrecioVenta() . "\n";
echo $objMoto12->darPrecioVenta() . "\n";
echo $objMoto13->darPrecioVenta() . "\n";
echo $objMoto14->darPrecioVenta() . "\n";*/

/*if ($objEmpresa->getColVentas()[0]->getColMoto()[2]->darPrecioVenta() != 1) {
    echo "funca";
} else {
    echo "no funca";
}*/
