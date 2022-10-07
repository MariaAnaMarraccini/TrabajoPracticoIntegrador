<?php
require_once 'clases/Usuario.php';
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
            <a href="#" class="btn btn-success">Dar de alta empleado</a>
          </div>
          <div class="col-md-4">
            <a href="#" class="btn btn-warning">Actualizar empleado</a>
          </div>
          <div class="col-md-4">
            <a href="#" class="btn btn-danger">Dar de baja empleado</a>
          </div>
        </div>
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
            <tr>
              <td>1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>34444555</td>
              <td>01/02/2022</td>
              <td>fulano</td>
            </tr>
            
          </tbody>
        </table>
      </div> 
    </body>
</html>

