<?php
require_once '../clases/Usuario.php';
require_once '../clases/RepositorioEmpleado.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Portal de empleados</title>
        <link rel="stylesheet" href="../bootstrap.min.css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>Portal de empleados</h1>
      </div>    
      <div class="text-center">
        <h3>Hola <?php echo $nomApe;?></h3>
        <p><a href="logout.php">Cerrar sesión</a></p>

        <?php 
        $rp = new RepositorioEmpleado();
        $res = $rp->getAll();
        //var_dump($rp->getAll());
        foreach( $res as $key => $value){
            //var_dump($value['id']);
            echo "<tr>
            <td>".$value['id']."</th>
            <td>".$value['nombre']."</td>
            <td>".$value['apellido']."</td>
            <td>".$value['dni']."</td>
            <td>".$value['fecha_ingreso']."</td>
            <td>".$value['id_usuario_ult_mod']."</td>
          </tr>";
        }
        // if ($rp['num_rows'] > 0) {
        //     // output data of each row
        //     while($row = $res->fetch_assoc()) {
        //       echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
        //     }
        //   } else {
        //     echo "0 results";
        //   }
        ?>
        <form method="POST" action="functions.php">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="number" class="form-control" name="id" placeholder="Ingresar ID de empleado">

            </div>
            
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div> 
    </body>
</html>

