<?php
require_once 'clases/Usuario.php';
require_once 'clases/Empleado.php';


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
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body class="container">
      <div class="jumbotron text-center">
      <h1>Portal de empleados</h1>
      </div>    
      <div class="text-center">
        <h3>Hola <?php echo $nomApe;?></h3>
        <p><a href="logout.php">Cerrar sesión</a></p>
        <div class="row">
          <div class="col-md-4">
            <a href="./employee/create.php" class="btn btn-success">Dar de alta empleado</a>
          </div>
          <div class="col-md-4">
            <a href="./employee/update.php" class="btn btn-warning">Actualizar empleado</a>
          </div>
          <div class="col-md-4">
            <a href="./employee/delete.php" class="btn btn-danger">Dar de baja empleado</a>
          </div>
        </div>
        <div class="mt-4">
        <a href="./employee/show.php" class="btn btn-primary">Ver listado de empleados</a>
        </div>
      </div> 
    </body>
</html>

