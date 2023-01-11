<?php

include('../database.php');

$query = "SELECT * from encabezadopartidas";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query Failed' . mysqli_error($connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'idPeriodo' => $row['idPeriodo'],
        'numeroPartida' => $row['numeroPartida'],
        'concepto' => $row['concepto'],
        'debe' => $row['debe'],
        'haber' => $row['haber'],
        'diferencia' => $row['diferencia'],
        'fecha' => $row['fecha'],
        'idEmpresa' => $row['idEmpresa']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;







?>