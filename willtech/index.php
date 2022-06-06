<?php

require_once 'Entidades/Usuarios.php';
require_once 'Entidades/Empleados.php';
require_once 'Dao/DaoEmpleado.php';


$usuario1 = new Usuarios("cperez", "halo123qwe", "tecnico"); 
$empleado1 = new Empleados("Cesar Alexis", "Perez Mejia", $usuario1);
echo "Nombre: " . $empleado1->getNombre() . "<br>";
echo "Apellidos: " . $empleado1->getApellidos() . "<br>";
echo "Usuario: " . $empleado1->getUsuario()->getUsername() . "<br>";
echo "Contraseña: " . $empleado1->getUsuario()->getPassword() . "<br>";
echo "Cargo: " . $empleado1->getUsuario()->getCargo() . "<br>";

$daoEmpleado = new DaoEmpleado(); 
$daoEmpleado->addEmpleado($empleado1);
?>