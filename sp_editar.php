<?php

$id = $_POST['id'];
$tipoviaje = $_POST['tipoviaje'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$obra = $_POST['obra'];
$placa = $_POST['placa'];
$fecha = $_POST['fecha'];


$cnx = mysqli_connect("localhost", "root", "", "cru_2");
$sql = "UPDATE viaje set tipoviaje='$tipoviaje', descripcion='$descripcion', cantidad='$cantidad', obra='$obra', placa='$placa', fecha='$fecha' where id like $id";
$rta = mysqli_query($cnx, $sql);

if (!$rta){
    echo "No se Actualizo!";
}
else{
    header("Location: index.php");
}



?>