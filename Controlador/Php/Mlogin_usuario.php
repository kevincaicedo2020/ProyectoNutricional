<?php
    require_once("../../autoload.php");
    use Modelo\Php\Paciente;

    $contraseña = (string) $_POST['contrasena'];
    $email = (string) $_POST['email'];
    $codigo = (string) $_POST['login'];
    $tipo_cliente = (string) $_POST['tipo_cliente'];
if(isset($_POST['login']) && $codigo=="ENVIAR"){

    

    if((strlen(trim($tipo_cliente))>0) && (strlen(trim($contraseña))>0) && (strlen(trim($email))>0) && is_string($email) && is_string($contraseña)){
        
        $conexion=mysqli_connect('localhost','kevin','kevinroot','nutricion');

        if($tipo_cliente == "tipo_nutricionista")
        {
            $consulta = "select * from nutricionista where emailNutricionista='".$email."' and contrasenaNutricionista= MD5('".$contraseña."');";
        }elseif($tipo_cliente == "tipo_paciente")
        {
            $consulta = "select * from paciente where emailPaciente='".$email."' and contrasenaPaciente= MD5('".$contraseña."');";
        }
        $resultado=mysqli_query($conexion,$consulta);

        if(($fila = mysqli_num_rows($resultado))>0)
        {   
            session_start();
            $valor=mysqli_fetch_assoc($resultado);

            if($tipo_cliente == "tipo_nutricionista")
            {
                $_SESSION['IDnutricionista'] = $valor['IDnutricionista'];
                header('location: /ProyectoNutricional/Vista/Html/registro.html');
            }
            elseif($tipo_cliente == "tipo_paciente")
            {
                $_SESSION['IDpaciente'] = $valor['IDpaciente'];
                //ESTA PARTE ES SI UN PACIENTE SE LOGEA
                header('location: /ProyectoNutricional/Vista/Html/pesoIdeal.html');
                
            }
            mysqli_free_result($resultado);
            mysqli_close($conexion);
            
        }else{
            mysqli_free_result($resultado);
            mysqli_close($conexion);
            header('location:/ProyectoNutricional/Vista/Html/login.html');
            die();
        }
    }else{
        header('location:/ProyectoNutricional/Vista/Html/login.html');
        die();
    }
  
}
elseif(isset($_POST['login']) && $codigo=="RECIBIR GMAIL"){
    Paciente::enviar_correo_restablecer_contraseña($email);
    header('location: /ProyectoNutricional/Vista/Html/login.html');
}
elseif(isset($_POST['login']) && $codigo=="RESTABLECER CONTRASEÑA"){
//      ESTA PARTE NO SE COMO SOLUCIONARLA 
    $conexion=mysqli_connect('localhost','kevin','kevinroot','nutricion');
    
    if($tipo_cliente == "tipo_nutricionista"){
        $consulta = 'update nutricionista set contrasenaNutricionista=MD5("'.$contraseña.'") where emailNutricionista="'.$email.'";';
    }elseif($tipo_cliente == "tipo_paciente"){
        $consulta = 'update paciente set contrasenaPaciente=MD5("'.$contraseña.'") where emailPaciente="'.$email.'";';
    }
    
    $resultado=mysqli_query($conexion,$consulta);
    if($resultado){
        header('Refresh:1;url=/ProyectoNutricional/Vista/Html/login.html');
    }
    else{
        header('location: https://mail.google.com/');
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
    
}
else{
    header('location:/ProyectoNutricional/Vista/Html/login.html');
    die();
}


?>