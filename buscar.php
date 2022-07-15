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
    $buscar = $_POST['buscar'];
    ?>
    
    <div class="buscar">
        <form action="" method="post">
            <input type="text" name="buscar" id="" value="<?=$buscar?>">
            <input type="submit" value="Buscar">
            <a href="nuevo.php">Nuevo</a>
        </form>
    </div>

    <div class="principal">
        <table border="6">
            <tr>
                <td>id</td>
                <td>tipoviaje</td>
                <td>descripcion</td>
                <td>cantidad</td>
                <td>obra</td>
                <td>placa</td>
                <td>fecha</td>
                <td>opciones</td>                
            </tr>

            <?php
            
            $cnx = mysqli_connect("localhost", "root", "", "cru_2");
            $sql = "SELECT id, tipoviaje, descripcion, cantidad, obra, placa, fecha FROM viaje where tipoviaje  like '$buscar' '%' or obra like '$buscar' '%' or placa like '$buscar' '%' or fecha like '$buscar' '%'order by id desc";
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
                    <a href="editar.php"
                        id=<?php echo $mostrar['0'] ?> &
                        tipoviaje=<?php echo $mostrar['1'] ?> &
                        descripcion=<?php echo $mostrar['2'] ?> &
                        cantidad=<?php echo $mostrar['3'] ?> &
                        obra=<?php echo $mostrar['4'] ?> &
                        placa=<?php echo $mostrar['5'] ?> &
                        fecha=<?php echo $mostrar['6'] ?>
                        ">Editar</a>
                    <a href="sp_eliminar.php? id=<?php echo $mostrar['0'] ?>">Eliminar</a>
                </td>
            </tr>
            <?php
            }
            ?>
            
        </table>
        


    
</body>
</html>