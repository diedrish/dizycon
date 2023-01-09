<?php

include('../database.php');

$query = "SELECT * from empresas";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query Failed' . mysqli_error($connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'idEmpresa' => $row['idEmpresa'],
        'empresa' => $row['nombre'],
        'nit' => $row['nit'],
        'nrc' => $row['nrc'],
        'giro' => $row['giro'],
        'telefono' => $row['Telefono'],
        'categoria' => $row['Categoria'],
        'direccion' => $row['direccion']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;







?>