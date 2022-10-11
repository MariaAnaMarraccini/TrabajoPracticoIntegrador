<?php
require_once '../.env.php';
require_once 'Empleado.php';

class RepositorioEmpleado
{

    private static $conexion = null;

    public function __construct()
    {
        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['base_de_datos'],
            );
            if (self::$conexion->connect_error) {
                $error = 'Error de conexión: ' . self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8');
        }
   }

   public function getAll()
   {
        $q = "SELECT * FROM empleados";
    
        $query = self::$conexion->prepare($q);

        $query->execute();
        $result = self::$conexion->query($query);
        if ($query->execute()) {
            // Se guardó bien, retornamos el id del usuario
            var_dump($result);
            
            return $result;
        } else {
            // No se guardó bien, retornamos false
            return false;
        }
   }

    public function save(Empleado $empleado)
    {
        $q = "INSERT INTO empleados ( nombre, apellido, dni, id_usuario_ult_mod) ";
        $q.= "VALUES (?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);
        
        $query->bind_param(
            "ssss",
            $empleado->getNombre(),
            $empleado->getApellido(),
            $empleado->getDNI(),
            $empleado->getUsuario()
        );
        if ($query->execute()) {
            // Se guardó bien, retornamos el id del usuario
            return self::$conexion->insert_id;
        } else {
            // No se guardó bien, retornamos false
            return false;
        }
    }

    public function update(Empleado $empleado)
    {
        $q = "UPDATE empleados ";
        var_dump($empleado);
        $q.= "SET nombre = ?, apellido = ?, dni = ?, id_usuario_ult_mod = ? WHERE id = ?";
        $query = self::$conexion->prepare($q);
        
        $query->bind_param(
            $empleado->getNombre(),
            $empleado->getApellido(),
            $empleado->getDNI(),
            $empleado->getUsuario(),
            $empleado->getId()
        );

        if ($query->execute()) {
            // Se guardó bien, retornamos el id del usuario
            return self::$conexion->insert_id;
        } else {
            // No se guardó bien, retornamos false
            return false;
        }
    }
}