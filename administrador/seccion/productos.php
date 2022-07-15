<?php  include('C:\xampp\htdocs\cru_2\template\header.php');?>
<?php
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";


include('C:\xampp\htdocs\cru_2\administrador\config\bd.php');




switch($accion){
    case "Agregar":
        $sentenciaSQL= $conexion->prepare("INSERT INTO viajes (nombre,imagen ) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        
        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen!="") {
            move_uploaded_file($tmpImagen, "../../imagenes/".$nombreArchivo);
        }
        
        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->execute();
        header('Location:productos.php');
        break;

    case "Modificar":

        $sentenciaSQL= $conexion->prepare("UPDATE viajes SET nombre=:nombre where id=:id");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        if($txtImagen!=""){

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
            
            move_uploaded_file($tmpImagen, "../../imagenes/".$nombreArchivo);

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM viajes where id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $viaje=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
            if ( isset($viaje["imagen"]) &&($viaje["imagen"]!="imagen.jpg") ) {
                
                if(file_exists("../../imagenes/".$viaje["imagen"])){
    
                    unlink("../../imagenes/".$viaje["imagen"]);
                }
            }

            $sentenciaSQL= $conexion->prepare("UPDATE viajes SET imagen=:imagen where id=:id");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
        }
        header('Location:productos.php');
        break;

    case "Cancelar":
        header('Location:productos.php');
        break;

    case "Seleccionar":

        $sentenciaSQL= $conexion->prepare("SELECT * FROM viajes where id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $viaje=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$viaje['nombre'];
        $txtImagen=$viaje['imagen'];

        //echo "Presionado boton Seleccionar";
        break;

    case "Borrar":

        $sentenciaSQL= $conexion->prepare("SELECT imagen FROM viajes where id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $viaje=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if ( isset($viaje["imagen"]) &&($viaje["imagen"]!="imagen.jpg") ) {
            
            if(file_exists("../../imagenes/".$viaje["imagen"])){

                unlink("../../imagenes/".$viaje["imagen"]);
            }
        }
        $sentenciaSQL= $conexion->prepare("DELETE FROM viajes where id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        header('Location:productos.php');
        break;
}

$sentenciaSQL= $conexion->prepare("SELECT * FROM viajes");
$sentenciaSQL->execute();
$listaviajes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de viajes
        </div>

        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" >
        <div class="form-group">
        <label for="txtID">ID: </label>
        <input type="text" required readonly class="form-control"  value="<?php echo $txtID; ?>" name="txtID"  id="txtId" placeholder="ID">
        </div>

        <div class="form-group">
        <label for="txtNombre">Nombre: </label>
        <input type="text" required class="form-control" name="txtNombre" value="<?php echo $txtNombre; ?>" id="txtNombre" placeholder="Nombre del viaje">
        </div>

        <div class="form-group">
        <label for="txtNombre">Imagen:</label>

        <br/>

        <?php if($txtImagen!=""){ ?>

            <img class="img-thumbnail rounded" src="../../imagenes/<?php echo $txtImagen; ?>" width="50" alt="" srcset="">
            
            <?php } ?>

        <input type="file" required class="form-control" name="txtImagen"  id="txtImagen" placeholder="Nombre del viaje">
        </div>

        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion"  value="Agregar" class="btn btn-success">Agregar</button>
            <button type="submit" name="accion"  value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion"  value="Cancelar" class="btn btn-info">cancelar</button>
        </div>

        </form>

        </div>

    </div>
</div>
<div class="col-md-7">
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaviajes as $viaje) { ?>
            <tr>
                <td><?php  echo $viaje['id']; ?></td>
                <td><?php  echo $viaje['nombre']; ?></td>
                <td>

                    <img class="img-thumbnail rounded"  src="../../imagenes/<?php  echo $viaje['imagen']; ?>" width="50" alt="" srcset="">
                    
                </td>

                <td>
                <form method="post">

                <input type="hidden" name="txtID" id="txtID" value="<?php  echo $viaje['id']; ?>"/>
                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

                </form>

            </td>
            </tr>
            <?php }  ?>
                
        </tbody>
    </table>



</div>

<?php include('C:\xampp\htdocs\cru_2\template\footer.php'); ?>