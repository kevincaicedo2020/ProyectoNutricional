<?php 
namespace Modelo\Php;
require_once("../../autoload.php");
use Modelo\Php\PHPMailer\PHPMailer;
use Modelo\Php\PHPMailer\Exception;
use Modelo\Php\PHPMailer\SMTP;
trait BD_Nutricion{
    public $conexion;
    public $consulta = "";
    
    public function saludar(){
        echo 'hola';
    }

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

            if((strlen(trim($cedula))==10) && (strlen(trim($nombre))>0) && (strlen(trim($edad))>0) && (strlen(trim($sexo))>0) && (strlen(trim($telefono))==10) && (strlen(trim($email))>0) && (strlen(trim($email))>0 && is_numeric($cedula) && is_string($nombre) && is_numeric($edad) && is_string($sexo) && is_numeric($telefono) && is_string($email)))
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

    public function enviar_correo_restablecer_contraseña(string $email){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                   // Enable verbose debug output  (  SMTP::DEBUG_SERVER;    )
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'nutricionbuenvivir@gmail.com';                     // SMTP username
            $mail->Password   = 'Lanutricionesbeneficiosa';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('nutricionbuenvivir@gmail.com', 'Nutricion');
            $mail->addAddress($email);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Restablece tu cuenta de Nutricion';
            $mail->Body    = '<p style="text-align: center;font-weight: bold;font-size: 23px;">NUTRICION</p>
            
                <form style="margin: auto;text-align: center; align-items: center;" action="http://localhost/ProyectoNutricional/Controlador/Php/Mlogin_usuario.php" method="POST">
                    
                    <div style="float: left;width: 50%;margin-bottom: 20px;text-align: center;">
                    <label for="nutricionista"  style="text-align: center;">
                    <p>Nutricionista</p>
                    </label>
                    <input type="radio" name="tipo_cliente" value="tipo_nutricionista" id="nutricionista" required>
                    </div>

                    <div style="float: right;width: 50%;margin-bottom: 20px;text-align: center;">
                    <label for="paciente" style="text-align: center;">
                    <p>Paciente</p>
                    </label>
                    <input type="radio" name="tipo_cliente" value="tipo_paciente" id="paciente" required>
                    </div>
                    
                <div>
                <label for="correo">Ingrese su correo:</label>
                <input type="email" id="correo" name="email" class="hola" required 
                style="width: 280px; margin-right: 10px; padding: 5px; margin-bottom: 10px; text-align: center;">

                <label for="contrasena">Restablesca su contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" class="hola" minlength="4" required style="width: 280px;padding: 5px;margin-bottom: 10px;
                text-align: center;">
                </div>

                <input type="submit" style="padding: 10px 200px;border: none;font-size: 22px;
                background-color: #28AA00;color: #ffffff;text-align: center;" name="login" value="RESTABLECER CONTRASEÑA">
                
                </form> ';
            

            $mail->send();
            //echo 'Se envio Correctamente';
        } catch (Exception $e) {
            echo "Error el mensaje no se ha enviado: {$mail->ErrorInfo}";
        }
    }

    public function consulta_para_insertar_usuarios(string $tipoUsuario){
        if($tipoUsuario == "ENVIAR DATOS DE PACIENTE"){
            session_start();
            global $cedula, $nombre, $edad, $sexo, $telefono, $email, $peso, $estatura;
            // AQUI AL MOMENTO EN QUE EL NUTRICIONISTA SE LOGEA DEBO AGREGAR SU ID EN UNA VARIABLE SESION PARA PONER SU ID EN EL '1' DE LA LINEA 50
            $this->consulta="insert into paciente(DNIpaciente,nombrePaciente,edadPaciente,sexoPaciente,telefonoPaciente,emailPaciente,fechaActualPaciente,IDnutricionista,pesoPaciente,estaturaPaciente) values (".$cedula.",'".$nombre."',".$edad.",'".$sexo."',".$telefono.",'".$email."',CURDATE(),".(int) $_SESSION['IDnutricionista'].",".$peso.",".$estatura.");";
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