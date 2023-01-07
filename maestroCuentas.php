<?php


if (isset($_GET['funcion']) && !empty($_GET['funcion'])) {
    $funcion = $_GET['funcion'];


    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch ($funcion) {
        case 'crearRegistro':
            crearRegistro();
            break;
        case 'listarCatalogo':
            listarCatalogo();
            break;
        case 'listarCatalogoName':
            listarCatalogoName();

            break;
    }
}



function crearRegistro()
{

    include('database.php');
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
    $query = "INSERT into maestrocuentas VALUES ('$codigo', '$empresa','$tipo','$cuenta','$costo','$movimiento','$rubro',
        '$cuentaMayor','$saldoInicial','$debe','$haber','$saldoFinal')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed.');
    }

    echo "CUENTA CREADA EXITOSAMENTE";

}


function listarCatalogo()
{

    include('database.php');

    $query = "SELECT * from maestroCuentas";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'codigo' => $row['codigo'],
            'tipo' => $row['tipoCuenta'],
            'cuenta' => $row['nombreCuenta'],
            'rubro' => $row['rubro'],
            'empresa' => $row['idEmpresa']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}


function listarCatalogoName()
{
    include('database.php');
    $search = $_GET['search'];

    $query = "SELECT * from maestroCuentas where nombreCuenta like '%$search%'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'codigo' => $row['codigo'],
            'tipo' => $row['tipoCuenta'],
            'cuenta' => $row['nombreCuenta'],
            'rubro' => $row['rubro'],
            'empresa' => $row['idEmpresa']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

}



function listarCatalogobyId()
{
    include('database.php');
    $search = $_GET['id'];

    $query = "SELECT * from maestroCuentas where nombreCuenta like '%$search%'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'codigo' => $row['codigo'],
            'tipo' => $row['tipoCuenta'],
            'cuenta' => $row['nombreCuenta'],
            'rubro' => $row['rubro'],
            'empresa' => $row['idEmpresa']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

}












?>