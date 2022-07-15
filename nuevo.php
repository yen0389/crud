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

    <div class="principal">
        
        <form action="sp_insertar.php" method="post">
            <table border="5">
                <tr>
                    <td>Ingresar Datos: </td>
                </tr>
                <tr>
                    <td>tipoviaje</td>
                    <td><input type="text" name="tipoviaje" id=""></td>
                </tr>
                <tr>
                    <td>descripcion</td>
                    <td><input type="text" name="descripcion" id=""></td>
                </tr>
                <tr>
                    <td>cantidad</td>
                    <td><input type="number" name="cantidad" id=""></td>
                </tr>
                <tr>
                    <td>obra</td>
                    <td><input type="text" name="obra" id=""></td>
                </tr>
                <tr>
                    <td>placa</td>
                    <td><select name="placa" id="">
                        <option>seleccione</option>
                        <option>CBS375</option>
                        <option>VBI715</option></select></td>
                </tr>
                <tr>
                    <td>fecha</td>
                    <td><input type="date" name="fecha" id=""></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Guardar"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>