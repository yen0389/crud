<?php 
session_start();
if($_POST){ 
    if(($_POST['usuario']=="GJPulidos")&&($_POST['contraseña']=="sistema")){
        
        
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="GJPulidos";
        header('Location:inicio.php');
    }else{
        $mensaje="Error: El usuario o contraseña son incorrectos";
    }

    } 
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio web</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link rel="stylesheet" href="./css/boostrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"/>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
<br/><br/><br/>
            <div class="card">
                <div class="card-header" style="background-image: linear-gradient(-225deg, #CBBACC 0%, #2580B3 100%);">
                    Login 
                </div>
                <div class="card-body">
                    
            <?php if(isset($mensaje)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php } ?>

                <form method="POST">

                    <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Escribe tu usuario">
                </div>

                <div class="form-group">
                    <label>Contraseña: </label>
                    <input type="password" class="form-control" name="contraseña" placeholder="Escribe tu contraseña">
                </div>
                <button type="submit" style="background-image: linear-gradient(-225deg, #CBBACC 0%, #2580B3 100%);" class="btn btn-primary">Entrar al Administrador</button>
                </form>
                </div>
            
            </div>
            </div>
        </div>
    </div>

    
</body>
</html>