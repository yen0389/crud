
<?php
$id = $_GET['id'];


$cnx = mysqli_connect("localhost", "root", "", "cru_2");
$sql = "DELETE FROM viaje where id like $id";
$rta = mysqli_query($cnx, $sql);
if (!$rta){
    echo "No se Elimino!";
}
else{
    header("Location: index.php");
}


?>

