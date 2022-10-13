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
            
            $result = self::$conexion->query("SELECT empleados.*, CONCAT(usuarios.nombre,' ',usuarios.apellido) as nombre_usuario FROM empleados INNER JOIN usuarios ON usuarios.id = empleados.id_usuario_ult_mod");

            $res = [];

            if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                       $arr = [ 'id' => $row["id"],'nombre' => $row["nombre"], 'apellido' => $row["apellido"], 'dni' => $row["dni"], 'id_usuario_ult_mod'=> $row["id_usuario_ult_mod"]." - ".$row["nombre_usuario"],'fecha_ingreso' => $row["fecha_ingreso"]];
                       array_push($res, $arr );
                    }
                  } 

                return $res;

    }

    public function countEmployees()
    {
        $result = self::$conexion->query("SELECT COUNT(id) as cantidad_empleados FROM empleados");

            $res = [];

            if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                       $arr = [ 'cantidad_empleados' => $row["cantidad_empleados"]];
                       array_push($res, $arr );
                    }
                  } 

                return $res;
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

    public function update(Empleado $empleado, $id)
    {
        $q = "UPDATE empleados ";

        $nombre = $empleado->getNombre();
        $apellido = $empleado->getApellido();
        $dni = $empleado->getDNI();
        $usuario = $empleado->getUsuario();

        $q.= "SET nombre = '$nombre', apellido = '$apellido', dni = $dni, id_usuario_ult_mod = $usuario WHERE id = $id";
        $query = self::$conexion->prepare($q);
        
        if ($query->execute()) {
            // Se guardó bien, retornamos el id del usuario
            return self::$conexion->insert_id;
        } else {
            // No se guardó bien, retornamos false
            return false;
        }
    }

    public function delete($id)
    {
        $q = "DELETE FROM empleados ";
        $q.= "WHERE id = $id";
        $query = self::$conexion->prepare($q);
        
        if ($query->execute()) {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }
}