<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    
<h2>CRUD GJPulidos</h2>

    <?php
$id = $_GET['id'];
$tipoviaje = $_GET['tipoviaje'];
$descripcion = $_GET['descripcion'];
$cantidad = $_GET['cantidad'];
$obra = $_GET['obra'];
$placa = $_GET['placa'];
$fecha = $_GET['fecha'];
?>
    <div class="principal">
        <form action="sp_editar.php" method="post">
            <table border="5">
                <tr>
                    <td>Ingresar Datos: </td>
                    <td><input type="text" name="id" id="" style="visibility:hidden" value="<?=$id?>"></td>
                </tr>
                <tr>
                    <td>tipoviaje</td>
                    <td><input type="text" name="tipoviaje" id="" value="<?=$tipoviaje?>"></td>
                </tr>
                <tr>
                    <td>descripcion</td>
                    <td><input type="text" name="descripcion" id="" value="<?=$descripcion?>"></td>
                </tr>
                <tr>
                    <td>cantidad</td>
                    <td><input type="number" name="cantidad" id="" value="<?=$cantidad?>"></td>
                </tr>
                <tr>
                    <td>obra</td>
                    <td><input type="text" name="obra" id=""  value="<?=$obra?>"></td>
                </tr>
                <tr>
                    <td>placa</td>
                    <td><select name="placa" id="" value="<?=$placa?>">
                        <option>seleccione</option>
                        <option>CBS375</option>
                        <option>VBI715</option></select></td>
                </tr>
                <tr>
                    <td>fecha</td>
                    <td><input type="date" name="fecha" id=""  value="<?=$fecha?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Actualizar"></td>
                    <td><a href="index.php">Cancelar</a></td>
                </tr>
            </table>
        </form>
    </div>

    
    
</body>
</html>