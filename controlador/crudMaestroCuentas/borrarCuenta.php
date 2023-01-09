<?php

include('../database.php');
$codigo = $_POST['codigo'];
$empresa = $_POST['empresa'];

$query = "delete from  maestrocuentas  where codigo='$codigo' and idEmpresa='$empresa'";


$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query Failed.');
}

echo "CUENTA BORRADA EXITOSAMENTE";




?>