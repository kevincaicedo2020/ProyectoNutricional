<?php
require_once("../../autoload.php");
use Modelo\Php\Nutricionista;
use Modelo\Php\Paciente;
session_start();
$buscar = $_POST['Buscador'];
$IDbuscador = (int) $_POST['buscar'];




if( isset($_POST['Buscador']) ){
    $INSnutricionista = new Nutricionista($IDbuscador,$_SESSION['nombreNutricionista'],$_SESSION['edadNutricionista'],$_SESSION['sexoNutricionista'],$_SESSION['telefonoNutricionista'],$_SESSION['emailNutricionista']);
    if($INSnutricionista->validarDatos($buscar)){
        $datos = $INSnutricionista->verificar_num_de_cedula_ver_que_tipo_es($IDbuscador,0);
        if( isset($datos['estaturaPaciente']) ){
            $_SESSION['modificarCedula'] = $datos['DNIpaciente'];
            $_SESSION['modificarNombre'] = $datos['nombrePaciente'];
            $_SESSION['modificarEdad'] = $datos['edadPaciente'];
            $_SESSION['modificarSexo'] = $datos['sexoPaciente'];
            $_SESSION['modificarTelefono'] = $datos['telefonoPaciente'];
            $_SESSION['modificarEmail'] = $datos['emailPaciente'];
            $_SESSION['modificarPeso'] = $datos['pesoPaciente'];
            $_SESSION['modificarEstatura'] = $datos['estaturaPaciente'];
            header('location: ../../Vista/Html/editarDatos.php');
        }else{
            $_SESSION['modificarCedula'] = $datos['DNInutricionista'];
            $_SESSION['modificarNombre'] = $datos['nombreNutricionista'];
            $_SESSION['modificarEdad'] = $datos['edadNutricionista'];
            $_SESSION['modificarSexo'] = $datos['sexoNutricionista'];
            $_SESSION['modificarTelefono'] = $datos['telefonoNutricionista'];
            $_SESSION['modificarEmail'] = $datos['emailNutricionista'];
            header('location: ../../Vista/Html/editarDatos.php');
        }
        
        
    }
}elseif( isset($_POST['modificar']) ){

    $cedula = (int) $_POST['cedula'];
    $nombre = (string) $_POST['nombre'];
    $edad = (int) $_POST['edad'];
    $sexo = (string) $_POST['sexo'];
    $telefono = (int) $_POST['telefono'];
    $email = (string) $_POST['email'];
    $peso = (int) $_POST['peso'];
    $estatura = (float) $_POST['estatura'];

    if(!empty(trim($peso)) && !empty(trim($estatura))){
        $tipoUsuario = "ENVIAR DATOS DE PACIENTE";
        $INSpaciente1 = new Paciente($cedula,$nombre,$edad,$sexo,$telefono,$email,$peso,$estatura);
        $conexion = $INSpaciente1->conexion_a_la_BD();
        $INSpaciente1->validarDatos($tipoUsuario);
        $resultado = mysqli_query($conexion,$INSpaciente1->consulta_para_modificar_usuarios($tipoUsuario));
        $INSpaciente1->eliminar_variables_session();
        $INSpaciente1->ver_si_conexion_BD_fue_exitosa($resultado,"editarDatos.php");
        $INSpaciente1->cerrar_a_la_BD($resultado,$conexion);
    }
    else{
        $tipoUsuario = "ENVIAR DATOS DE NUTRICIONISTA";
        $INSnutricionista1 = new Nutricionista($cedula,$nombre,$edad,$sexo,$telefono,$email);
        $conexion = $INSnutricionista1->conexion_a_la_BD();
        $INSnutricionista1->validarDatos($tipoUsuario);
        $resultado = mysqli_query($conexion,$INSnutricionista1->consulta_para_modificar_usuarios($tipoUsuario));
        $INSnutricionista1->eliminar_variables_session();
        $INSnutricionista1->ver_si_conexion_BD_fue_exitosa($resultado,"editarDatos.php");
        $INSnutricionista1->cerrar_a_la_BD($resultado,$conexion);
        
    }
}



?>