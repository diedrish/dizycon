<?php



include('../database.php');

$query = "SELECT * FROM maestrocuentas ORDER by codigo;";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query Failed' . mysqli_error($connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'codigo' => $row['codigo'],
        'empresa' => $row['idEmpresa'],
        'tipo' => $row['tipoCuenta'],
        'cuenta' => $row['nombreCuenta'],
        'costo' => $row['centroCosto'],
        'movimiento' => $row['movimiento'],
        'rubro' => $row['rubro'],
        'cuentaMayor' => $row['cuentaMayor']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;








?>