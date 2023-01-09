<?php

include('../database.php');
$nombre = $_POST['empresa'];
$nit = $_POST['tipo'];
$nrc = $_POST['cuenta'];
$giro = $_POST['costo'];
$telefono = $_POST['movimiento'];
$categoria = $_POST['rubro'];
$direccion = $_POST['cuentaMayor'];


$query = "INSERT into empresas VALUES (null,'$nombre', '$nit','$nrc','$direccion','$giro','$telefono','$categoria')";


$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query Failed.');
}

echo "CUENTA CREADA EXITOSAMENTE";




?>