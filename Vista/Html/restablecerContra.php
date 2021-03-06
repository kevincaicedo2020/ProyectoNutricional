
<?php
session_start();
if( !empty($_SESSION['IDnutricionista']) ):
    header('location: registro.php');
    die();
elseif( !empty($_SESSION['IDpaciente']) ):
    header('location: /ProyectoNutricional/Vista/Html/panelpaciente.php');
    die();
else:

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gayathri&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Lato:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/loginYregistroñ.css" type="text/css">
</head>
<body>

<!--CABEZERA-->
<header>
    <div class="menu">
        <div class="logo">
            <p><a href="index.html">CUIDA TU VIDA</a></p>
        </div>
        <nav id="nvg_menu_arriba">
            <ul>
                <li><a href="index.html">INICIO</a></li>
                <li><a href="retos.html">SERVICIO</a></li>
                <li><a href="contacto.html">CONTACTO</a></li>
                <li class="ultimo"><a href="login.php">LOGIN</a></li>
            </ul>
        </nav>
    </div>
</header>


    <div class="foto_login">
        <div class="centar_contenido">
            <div class="texto">
                <h2 class="texto_lista2">INGRESE SU CORREO ELECTRONICO</h2>
            </div>
    <div class="formulario">
        <form action="../../Controlador/Php/Mlogin_usuario.php" method="POST">         <!--colocar el archivo para enviar los datos-->
    
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-envelope icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="email" class="input_campo" name="email" placeholder="Por favor ingresa tu gmail"required>
                    <hr>
                </div>
            </div>
            <div class="submit">
                <input type="submit" class="input_submit" name="login" value="RECIBIR GMAIL">
            </div>
            <a href="login.php" id="olvidarContraseña">Ingresar a la cuenta</a>
            
        </form>
    </div>
        </div>
    </div>
    
</body>
</html>
<?php
endif;
?>