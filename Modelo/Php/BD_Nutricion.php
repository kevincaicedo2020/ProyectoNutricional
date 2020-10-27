<?php 
namespace Modelo\Php;

trait BD_Nutricion{
    public $conexion;
    public $consulta = "";
    public function conexion_a_la_BD(){
        $this->conexion = mysqli_connect('localhost','kevin','kevinroot','nutricion');
        return $this->conexion;
    }

    public function cerrar_a_la_BD(bool $resultado,object $conexion){
        mysqli_free_result($resultado);
        mysqli_close($conexion); 
    }

    public function validarDatos(string $tipoUsuario){

        if(isset($tipoUsuario) && !empty($tipoUsuario)){
            global $cedula,$nombre,$edad,$sexo,$telefono,$email;

            if((strlen(trim($cedula))>0) && (strlen(trim($nombre))>0) && (strlen(trim($edad))>0) && (strlen(trim($sexo))>0) && (strlen(trim($telefono))>0) && (strlen(trim($email))>0) && (strlen(trim($email))>0 && is_numeric($cedula) && is_string($nombre) && is_numeric($edad) && is_string($sexo) && is_numeric($telefono) && is_string($email)))
            {                
                //en esto ya estaria validado los datos de Nutricionista

                if($tipoUsuario == "ENVIAR DATOS DE PACIENTE"){
                    global $peso, $estatura;
                    if( (strlen(trim($peso))>0) && (strlen(trim($estatura))>0) && is_numeric($peso) && is_float($estatura)){
                        //en esto ya estaria validado los datos de Paciente
                    }else{
                        header('location: ../../Vista/Html/registro.html');
                        die();
                    }
                }
            }
            else{
                header('location: ../../Vista/Html/registro.html');
                die();
            }
        }else{
            header('location: ../../Vista/Html/registro.html');
            die();
        }
    }

    public function consulta_para_insertar_usuarios(string $tipoUsuario){
        if($tipoUsuario == "ENVIAR DATOS DE PACIENTE"){
            global $cedula, $nombre, $edad, $sexo, $telefono, $email, $peso, $estatura;
            $this->consulta="insert into paciente(DNIpaciente,nombrePaciente,edadPaciente,sexoPaciente,telefonoPaciente,emailPaciente,fechaActualPaciente,IDnutricionista,pesoPaciente,estaturaPaciente) values (".$cedula.",'".$nombre."',".$edad.",'".$sexo."',".$telefono.",'".$email."',CURDATE(),1,".$peso.",".$estatura.");";
        }elseif($tipoUsuario == "ENVIAR DATOS DE NUTRICIONISTA"){
            global $cedula,$nombre,$edad,$sexo,$telefono,$email;
            $this->consulta="insert into nutricionista(DNINutricionista,nombreNutricionista,edadNutricionista,sexoNutricionista,telefonoNutricionista,emailNutricionista,fechaActualNutricionista) values (".$cedula.",'".$nombre."',".$edad.",'".$sexo."',".$telefono.",'".$email."',CURDATE());";
        }
        return $this->consulta;
    }

    public function ver_si_conexion_BD_fue_exitosa(bool $resultado, string $direccion){
        if($resultado){
            echo '
            <div style="margin: 15% auto;width: 50%;background-color: #8EFF3F;text-align: center;border-radius: 80px 5px 80px 5px;">
            <p style="padding: 60px 40px;font-size: 37px;font-weight: bold;color: #ffffff;">HECHO!</p></div>';
            header('Refresh:2; url=../../Vista/Html/'.$direccion);
        }else{
            echo '<div style="margin: 15% auto;width: 50%;background-color: #F91717;text-align: center;border-radius: 80px 5px 80px 5px;">
            <p style="padding: 60px 40px;font-size: 37px;font-weight: bold;color: #ffffff;">ERROR! POR VAFOR INTENTE NUEVAMENTE</p></div>';
            header('Refresh:2; url=../../Vista/Html/'.$direccion);
            die();                          
        }
    }

}

?>