<?php

class Empleado
{
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $dni;
    protected $id_usuario_ult_mod;
    protected $fecha_alta;

    public function __construct( $nombre, $apellido, $dni, $id_usuario_ult_mod, $id = null, $fecha_alta = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->id_usuario_ult_mod = $id_usuario_ult_mod;
        $this->fecha_alta = $fecha_alta;
    }

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}
    public function getUsuario() {return $this->id_usuario_ult_mod;}
    public function getNombre() {return $this->nombre;}
    public function getApellido() {return $this->apellido;}
    public function getFechaAlta() {return $this->fecha_alta;}
    public function getDNI() {return $this->dni;}
}