<?php
require_once '../clases/Empleado.php';
require_once '../clases/RepositorioEmpleado.php';



//var_dump($_POST);

if(isset($_POST['id'])){

    $empleado = new Empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['id_usuario'],$_POST['id']);
    // var_dump($empleado);
    // die();
    $er = new RepositorioEmpleado();
    $er->update($empleado);
}else{
    $empleado = new Empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['id_usuario']);
    $er = new RepositorioEmpleado();
    $er->save($empleado);
}

header('Location: ../home.php');

die();