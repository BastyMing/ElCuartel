<?php

class User extends Model{
    protected $table = "usuario";
    public $nombre;
    public $apellido;
    public $rut;
    public $fecha_de_nacimiento;
    public $correo;
    public $password;
    public $nivel;
}