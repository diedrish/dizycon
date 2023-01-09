<?php

include('../database.php');
$idEmpresa = $_POST['idEmpresa'];

$query = "delete from  empresas  where idEmpresa='$idEmpresa' ";


$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query Failed.');
}

echo "CUENTA BORRADA EXITOSAMENTE";




?>