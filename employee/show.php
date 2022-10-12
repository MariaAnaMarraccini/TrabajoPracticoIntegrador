<?php
require_once '../clases/Usuario.php';
require_once '../clases/Empleado.php';
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
        <p><a href="../logout.php">Cerrar sesión</a></p>
        <div class="row">
        <table class="table mt-4">

          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">DNI</th>
              <th scope="col">Ingreso</th>
              <th scope="col">Modificado por</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $rp = new RepositorioEmpleado();
            $res = $rp->getAll();
            foreach( $res as $key => $value){
                echo "<tr>
                <td>".$value['id']."</th>
                <td>".$value['nombre']."</td>
                <td>".$value['apellido']."</td>
                <td>".$value['dni']."</td>
                <td>".$value['fecha_ingreso']."</td>
                <td>".$value['id_usuario_ult_mod']."</td>
              </tr>";
            }

            ?>
          </tbody>
        </table>
      </div> 
    </body>
</html>

