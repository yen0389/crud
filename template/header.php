<?php 
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location:../../administrador/index.php');
}else{

    if($_SESSION['usuario']=="ok"){
        $nombreUsuario=$_SESSION["nombreUsuario"];
    }
}  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"/>

</head>
<body>

    <?php $url="http://".$_SERVER['HTTP_HOST']."/cru_2"  ?>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador del sitio web <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>..//administrador/inicio.php">inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>..//administrador/seccion/productos.php">viajes</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>../index2.php"> Ver sitio web</a>
            <a class="nav-item nav-link" href="../index.php">Control</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>..//administrador/seccion/cerrar.php">cerrar</a>
        </div>
        </nav>
    <div class="container">
<br/>
        <div class="row">

        