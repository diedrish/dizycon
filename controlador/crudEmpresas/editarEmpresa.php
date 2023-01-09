<?php

include('../database.php');

$idEmpresa = $_POST['idEmpresa'];
$empresa = $_POST['nombre'];
$nit = $_POST['nit'];
$nrc = $_POST['nrc'];
$giro = $_POST['giro'];
$telefono = $_POST['telefono'];
$categoria = $_POST['categoria'];
$direccion = $_POST['direccion'];
$query = "update empresas set nombre='$empresa',Telefono='$telefono',Categoria='$categoria',direccion='$direccion',giro='$giro',nit='$nit',nrc='$nrc' where idEmpresa='$idEmpresa'";
echo $query;
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query Failed.');
}





?>