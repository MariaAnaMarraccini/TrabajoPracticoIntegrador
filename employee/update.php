<?php
require_once '../clases/Usuario.php';
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
        <form method="POST" action="functions.php">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="number" class="form-control" name="id" placeholder="Ingresar ID de empleado">

            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre">

            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" placeholder="Ingresar apellido">

            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="number" class="form-control" name="dni" placeholder="Ingresar DNI">

            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" value="<?php echo $usuario->getId();?>" name="id_usuario" >

            </div>
            <button type="submit" class="btn btn-primary">Dar de alta</button>
        </form>
      </div> 
    </body>
</html>

