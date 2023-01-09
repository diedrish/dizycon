<?php

include('../database.php');
$codigo = $_POST['codigo'];
$empresa = $_POST['empresa'];
$tipo = $_POST['tipo'];
$cuenta = $_POST['cuenta'];
$costo = $_POST['costo'];
$movimiento = $_POST['movimiento'];
$rubro = $_POST['rubro'];
$cuentaMayor = $_POST['cuentaMayor'];
$saldoInicial = '0.00';
$debe = '0.00';
$haber = '0.00';
$saldoFinal = '0.00';
$query = "update maestrocuentas set tipoCuenta='$tipo',nombreCuenta='$cuenta',centroCosto='$costo',movimiento='$movimiento',cuentaMayor='$cuentaMayor',rubro='$rubro' 
where codigo='$codigo' and idEmpresa='$empresa'";


$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query Failed.');
}

echo "CUENTA ACTUALIZADA EXITOSAMENTE";




?>