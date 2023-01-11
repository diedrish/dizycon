<?php

include('../database.php');

$periodo = $_POST['periodo'];
$numero = $_POST['numero'];
$concepto = $_POST['concepto'];
$fecha = $_POST['fecha'];
$empresa = $_POST['empresa'];


$query = "INSERT into encabezadopartidas VALUES ('$periodo','$numero','$concepto', '0.00','0.00','0.00','$fecha','$empresa')";
echo $query;

$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query Failed.');
}

echo "CUENTA CREADA EXITOSAMENTE";




?>