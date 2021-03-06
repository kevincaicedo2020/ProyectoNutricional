<?php

require_once("../../autoload.php");
use Modelo\Php\Paciente;
use Modelo\Php\Nutricionista;


    $cedula = (int) $_POST['cedula'];
    $nombre = (string) $_POST['nombre'];
    $edad = (int) $_POST['edad'];
    $sexo = (string) $_POST['sexo'];
    $telefono = (int) $_POST['telefono'];
    $email = (string) $_POST['email'];
    $solicitar_cita = (string) $_POST['enviar'];
    
    
        if(isset($_POST['paciente'])){
            $peso = (int) $_POST['peso'];
            $estatura = (float) $_POST['estatura'];
            $paciente = $_POST['paciente'];    
            $INSpaciente = new Paciente($cedula,$nombre,$edad,$sexo,$telefono,$email,$peso,$estatura);
            $conexion = $INSpaciente->conexion_a_la_BD();
            $INSpaciente->validarDatos($paciente);
            $INSpaciente->enviar_correo_restablecer_contraseña($email);
            $resultado = mysqli_query($conexion,$INSpaciente->consulta_para_insertar_usuarios($paciente));      
            $INSpaciente->ver_si_conexion_BD_fue_exitosa($resultado,"registro.php");
            $INSpaciente->cerrar_a_la_BD($resultado,$conexion);
            //me faltaria saber si 
            
        }
        elseif(isset($_POST['nutricionista'])){
            
            $nutricionista = $_POST['nutricionista'];    
        
            $INSnutricionista = new Nutricionista($cedula,$nombre,$edad,$sexo,$telefono,$email);
            $conexion = $INSnutricionista->conexion_a_la_BD();
            $INSnutricionista->validarDatos($nutricionista);
            $INSnutricionista->enviar_correo_restablecer_contraseña($email);
            $resultado = mysqli_query($conexion,$INSnutricionista->consulta_para_insertar_usuarios($nutricionista));
            $INSnutricionista->ver_si_conexion_BD_fue_exitosa($resultado,"registro.php");
            $INSnutricionista->cerrar_a_la_BD($resultado,$conexion);
            
        }elseif(isset($_POST['enviar'])){
            $nombre_solicitud = (string) $_POST['nombre_solicitud'];
            $email_solicitud = (string) $_POST['email_solicitud'];
            $telefono_solicitud = (string) $_POST['telefono_solicitud'];
            $mensaje_solicitud = (string) $_POST['mensaje_solicitud'];
            Nutricionista::enviar_correo_contacto($nombre_solicitud, $email_solicitud, $telefono_solicitud, $mensaje_solicitud);
            header('location: ../../Vista/Html/contacto.html');
        }
       

?>