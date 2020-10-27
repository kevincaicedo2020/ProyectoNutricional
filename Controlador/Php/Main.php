<?php

require_once("../../autoload.php");
use Modelo\Php\Paciente;
use Modelo\Php\Nutricionista;
use Modelo\Php\PlanNutricional;
use Modelo\Php\Alimento;

    $cedula = (int) $_POST['cedula'];
    $nombre = (string) $_POST['nombre'];
    $edad = (int) $_POST['edad'];
    $sexo = (string) $_POST['sexo'];
    $telefono = (int) $_POST['telefono'];
    $email = (string) $_POST['email'];

if(isset($_POST['paciente'])){
    $peso = (int) $_POST['peso'];
    $estatura = (float) $_POST['estatura'];
    $paciente = $_POST['paciente'];    
    $INSpaciente = new Paciente($cedula,$nombre,$edad,$sexo,$telefono,$email,$peso,$estatura);
    $conexion = $INSpaciente->conexion_a_la_BD();
    $INSpaciente->validarDatos($paciente);
    $resultado = mysqli_query($conexion,$INSpaciente->consulta_para_insertar_usuarios($paciente));
    $INSnutricionista->ver_si_conexion_BD_fue_exitosa($resultado);
    $INSpaciente->cerrar_a_la_BD($resultado,$conexion);
    //de aqui en adelante toca verificar si la consulta se guardo en la BD o si me da error talvez mandar un mensaje
}
elseif(isset($_POST['nutricionista'])){
    
    $nutricionista = $_POST['nutricionista'];    

    $INSnutricionista = new Nutricionista($cedula,$nombre,$edad,$sexo,$telefono,$email);
    $conexion = $INSnutricionista->conexion_a_la_BD();
    $INSnutricionista->validarDatos($nutricionista);
    $resultado = mysqli_query($conexion,$INSnutricionista->consulta_para_insertar_usuarios($nutricionista));
    $INSnutricionista->ver_si_conexion_BD_fue_exitosa($resultado,"registro.html");
    $INSnutricionista->cerrar_a_la_BD($resultado,$conexion);
    
}




$planNutri = new PlanNutricional(1.1,1.2,1.3,1.4,1.5,1.6,1.7,1.8,1.9);
$comida = new Alimento("comida", 15, "patataa");



?>