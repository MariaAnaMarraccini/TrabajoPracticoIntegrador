<?php
require_once '../clases/Empleado.php';
require_once '../clases/RepositorioEmpleado.php';

if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni']) && isset($_POST['id_usuario']) ){
    //actualizar
    $empleado = new Empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['id_usuario']);
    $er = new RepositorioEmpleado();
    $er->update($empleado,$_POST['id']);
}else if(isset($_POST['id'])){
    //borrar empleado
    $er = new RepositorioEmpleado();
    $er->delete($_POST['id']);
}else{
    //Crear empleado
    $empleado = new Empleado($_POST['nombre'],$_POST['apellido'],$_POST['dni'],$_POST['id_usuario']);
    $er = new RepositorioEmpleado();
    $er->save($empleado);
}

header('Location: ../home.php');

