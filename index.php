<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>CRUD</title>
</head>
<body>

        <h2>CRUD GJPulidos</h2>

    
    <div class="buscador">
        <form action="buscar.php" method="post">
            <input type="text" name="buscar" id="">
            <input type="submit" value="buscar">
            <a href="nuevo.php">Nuevo</a>
        </form>
    </div>

    <div class="principal">
        <table border="3">
            <tr>
                <td class="princi">id</td>
                <td class="princi">tipoviaje</td>
                <td class="princi">descripcion</td>
                <td class="princi">cantidad</td>
                <td class="princi">obra</td>
                <td class="princi">placa</td>
                <td class="princi">fecha</td>
                <td class="princi">opciones</td>                
            </tr>

            <?php
            $cnx = mysqli_connect("localhost", "root", "", "cru_2");
            $sql = "SELECT id, tipoviaje, descripcion, cantidad, obra, placa, fecha FROM viaje order by id desc";
            $rta = mysqli_query($cnx, $sql);
            while ($mostrar = mysqli_fetch_row($rta)) {
                ?>

            <tr>
                <td><?php echo $mostrar['0'] ?></td>
                <td><?php echo $mostrar['1'] ?></td>
                <td><?php echo $mostrar['2'] ?></td>
                <td><?php echo $mostrar['3'] ?></td>
                <td><?php echo $mostrar['4'] ?></td>
                <td><?php echo $mostrar['5'] ?></td>
                <td><?php echo $mostrar['6'] ?></td>
                <td>
                    <a href="editar.php?
                        id=<?php echo $mostrar['0'] ?> &
                        tipoviaje=<?php echo $mostrar['1'] ?> &
                        descripcion=<?php echo $mostrar['2'] ?> &
                        cantidad=<?php echo $mostrar['3'] ?> &
                        obra=<?php echo $mostrar['4'] ?> &
                        placa=<?php echo $mostrar['5'] ?> &
                        fecha=<?php echo $mostrar['6'] ?>
                        "><input type="submit" value="Editar"></a>
                    <a href="sp_eliminar.php? id=<?php echo $mostrar['0'] ?>"><input type="submit" class="btn btn-primary" value="Eliminar"></a>
                </td>
            </tr>
            <?php
            }
            ?>
            
        </table>
    </div>

    <br/>
        <button class="button"><a class="nav-item nav-link" href="administrador\inicio.php">Atras</a></button>
    
</body>
</html>

