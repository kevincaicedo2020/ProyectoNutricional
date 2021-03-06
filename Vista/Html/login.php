
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
    <title>Login</title>
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
                <h2 class="texto_lista2">BIENVENIDO</h2>
            </div>
    <div class="formulario">
        <form action="../../Controlador/Php/Mlogin_usuario.php/" method="POST">        
            
            <div class="campo_user">
                <div class="icon_user">
                    <input type="radio" name="tipo_cliente" value="tipo_nutricionista" id="nutricionista" required>
                    <label for="nutricionista">
                    <i class="fas fa-user-md iconos"></i>
                    </label>
                    <i class="fas fa-check hola1"></i>
                </div>
                <div class="icon_user">
                    <input type="radio" name="tipo_cliente" value="tipo_paciente" id="paciente" required>
                    <label for="paciente">
                    <i class="fas fa-user iconos"></i>
                    </label>
                    <i class="fas fa-check hola2"></i>
                </div>
            </div>

            <div class="campo">
                <div class="icon">
                    <i class="fas fa-envelope icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="email" class="input_campo" name="email" placeholder="Ingresa tu email" required="">
                    <hr>
                </div>
            </div>

            <div class="campo">
                <div class="icon">
                    <i class="fas fa-lock icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="password" class="input_campo" name="contrasena" placeholder="Ingresa tu contraseña" minlength="4" required>
                    <hr>
                </div>
            </div>

            <div class="submit">
                <input type="submit" class="input_submit" name="login" value="ENVIAR">
            </div>
            <a href="restablecerContra.php" id="olvidarContraseña">¿Restablecer tu contraseña?</a>
            
        </form>
    </div>
        </div>
    </div>
</body>
</html>
<?php
endif;
?>