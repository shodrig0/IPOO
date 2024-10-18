<?php

include_once('venta.php');
include_once('moto.php');
include_once('cliente.php');
include_once('empresa.php');

/**
 * crear dos instancias de clientes
 * 1
 */
$objCliente1 = new Cliente("Ramiro", "Funes Mori", false, "DNI", 1234);
$objCliente2 = new Cliente("Matías", "Kranevitter", true, "DNI", 4531);

/**
 * Cree 3 objetos Motos con la información visualizada en la tabla: 
 * código, costo, año fabricación,
 * descripción, porcentaje incremento anual, activo.
 * 2
 */
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 70, false);

// punto 4:
$empresa = new Empresa("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2],  [$objMoto1, $objMoto2, $objMoto3], []);

echo "--------------------------------------------\n";

// punto 5:
$colCodigosMoto1 = [11, 12, 13];
$resultado1 = $empresa->registrarVenta($colCodigosMoto1, $objCliente2);
echo "Resultado de la primera venta: " . $resultado1 . "\n";

echo "--------------------------------------------\n";

// punto 6:
$colCodigosMoto2 = [0];
$resultado2 = $empresa->registrarVenta($colCodigosMoto2, $objCliente2);
echo "Resultado de la segunda venta: " . $resultado2 . "\n";

echo "--------------------------------------------\n";

// punto 7:
$colCodigosMoto3 = [2];
$resultado3 = $empresa->registrarVenta($colCodigosMoto3, $objCliente2);
echo "Resultado de la tercera venta: " . $resultado3 . "\n";

echo "--------------------------------------------\n";

echo "Ventas del cliente:\n";
// punto 8:
$resultadoVentasCliente1 = $empresa->listadoVentasCliente($objCliente1);

echo $objCliente1;

if ($resultadoVentasCliente1 != null) {
    echo $resultadoVentasCliente1;
} else {
    echo "﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀\n";
    echo "No se encontraron commpras para el cliente\n";
}

echo "--------------------------------------------\n";

// punto 9:
$resultadoVentasCliente2 = $empresa->listadoVentasCliente($objCliente2);

if ($resultadoVentasCliente2 != null) {
    echo $resultadoVentasCliente2;
} else {
    echo "﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀﹀\n";
    echo "No se encontraron compras para el cliente\n";
}

echo "--------------------------------------------\n";

// punto 10:
echo $empresa;
