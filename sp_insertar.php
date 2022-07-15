<?php
$tipoviaje = $_POST['tipoviaje'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$obra = $_POST['obra'];
$placa = $_POST['placa'];
$fecha = $_POST['fecha'];

$cnx = mysqli_connect("localhost", "root", "", "cru_2");
$sql = "INSERT INTO  viaje(tipoviaje, descripcion, cantidad, obra, placa, fecha) VALUES ('$tipoviaje', '$descripcion', '$cantidad', '$obra', '$placa', '$fecha')";
$rta = mysqli_query($cnx, $sql);
if (!$rta){
    echo "No se Inserto!";
}
else{
    header("Location: index.php");
}



?>