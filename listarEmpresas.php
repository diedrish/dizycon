<?php

  include('database.php');

  $query = "SELECT * from empresas";
  $result = mysqli_query($connection, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($connection));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id' => $row['idEmpresa'],
      'nombre' => $row['nombre']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
