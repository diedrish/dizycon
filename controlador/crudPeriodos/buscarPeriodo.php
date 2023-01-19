<?php

include('../database.php');

$idEmpresa = $_POST['idEmpresa'];
$idPeriodo = $_POST['idPeriodo'];
$query = "SELECT (actual+1)as actual from periodos where idPeriodo='$idPeriodo' and idEmpresa='$idEmpresa'";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query Failed' . mysqli_error($connection));
}

 $actual="";
$json = array();
while ($row = mysqli_fetch_array($result)) {

    $actual = $row['actual'];
    
}

echo $actual;







?>