<?php
session_start();
if( !empty($_SESSION['IDnutricionista']) ):
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="../Css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gayathri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Lato:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <!--  ESTILOS DE CSS DEL PANEL ADMINISTRADOR     -->
    <link rel="stylesheet" href="../Css/panelAdministrador.css">

</head>
<body>

    <div class="foto_registro">
    <!-- MENU -->
                <nav id="navegacion">
                    <div id="menutoogle">
                        <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                        <ul id="menu">
                            <p class="centradop">CUIDAMOS DE TI</p>
                            <a href="registro.php">
                                <li> <i class="fas fa-2x fa-male"> </i> Registro de nuevo Usuario</li></a>
                            <a href="editarDatos.php">
                                <li> <i class="fas fa-2x fa-user-edit"></i> Editar datos de Usuario</li></a>
                            <a href="asignacionPlanNutricional.php">
                                <li> <i class="far fa-2x fa-clipboard"> </i> Crear Plan Nutricional</li></a>
                            <a href="tabProteinas-nutricionista.php">
                                <li> <i class="fas fa-2x fa-apple-alt"> </i> Tablas de Proteinas</li></a>
                            <a href="IMC-nutricionista.php">
                                <li> <i class="fas fa-2x fa-male"> </i> </i> Tablas de IMC</li></a>
                            <a href="PesoNutricionista.php">
                            <li> <i class="fas fa-2x fa-child"></i> Peso Ideal</li></a>
                            <a href="../../Modelo/Php/cierresession.php">
                            <li> <i class="far fa-2x fa-times-circle"> </i> CIERRE DE SESION </li></a>
                            <p class="nombre"> <i class="fas fa-file-signature nombre"></i> <?php echo 'Nombre de Usuario: '.$_SESSION['nombreNutricionista']; ?></p>
                        </ul>
                    </div>
                </nav>

<section class="contenedor-global">
<form action="../../Controlador/Php/Mmodificar_usuario.php" method="POST">
    <div class="buscar-usuario">
        <label for="buscar">Buscar Paciente:</label>
        <i class="fas fa-search"> </i><input type="number" id="buscar-cedula" name="buscar" placeholder="230007225-3" pattern="[0-9]+" required>
        <input type="submit" id="buscar-dato" name="Buscador" value="Buscar">
    </div>
</form>
<form action="../../Controlador/Php/Mmodificar_usuario.php" method="POST">
    <div class="informacion-editar">
        <fieldset>
            <legend> Informacion </legend>
            <label for="cedula">Cedula:</label> 
            <input type="number" id="cedula" name="cedula" placeholder="Ingresa tu cedula" pattern="[0-9]+" <?php 
            
            if(isset($_SESSION['modificarCedula'])){
                echo 'value="'.$_SESSION['modificarCedula'].'"';
                
            }
            ?> required> <br>


            <label for="nombre">Nombre:</label> 
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" pattern="[A-Za-z]+" <?php 
            if(isset($_SESSION['modificarNombre'])){
                echo 'value="'.$_SESSION['modificarNombre'].'"';
                
            }
            ?> required > <br>

            <label for="edad">Edad:</label> 
            <input type="number" id="edad" name="edad" placeholder="Ingresa tu edad" max="200" pattern="[0-9]+" <?php 
            if(isset($_SESSION['modificarEdad'])){
                echo 'value="'.$_SESSION['modificarEdad'].'"';
                
            }
            ?> required> <br>


            <div class="negrita-radio">
                <label for="sexo">Sexo:</label>
                <input type="radio" id="masculino" name="sexo" value="M" <?php 
            if($_SESSION['modificarSexo']=="M"){
                echo 'checked="checked"';
                
            }
            ?> required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="femenino" name="sexo" value="F" <?php 
           if($_SESSION['modificarSexo']=="F"){
            echo 'checked="checked"';
            
        }
            ?> required>
                <label for="femenino">femenino</label> <br>
            </div>

            <label for="telefono">Telefono:</label> 
            <input type="number" id="telefono" name="telefono" placeholder="Ingresa tu celular" pattern="[0-9]+" <?php 
            if(isset($_SESSION['modificarTelefono'])){
                echo 'value="'.$_SESSION['modificarTelefono'].'"';
                
            }
            ?> required>  <br>

            <label for="correo">Email:</label> 
            <input type="email" id="correo" name="email" placeholder="Ingresa tu Gmail" <?php 
            if(isset($_SESSION['modificarEmail'])){
                echo 'value="'.$_SESSION['modificarEmail'].'"';
                
            }
            ?> required> <br>

            <label for="peso">Peso(Kg):</label> 
            <input type="number" id="peso" name="peso" placeholder="Ingresa tu peso en Kg" pattern="[0-9]+" <?php 
            if(isset($_SESSION['modificarPeso'])){
                echo 'value="'.$_SESSION['modificarPeso'].'"';
                
            }
            else{
                echo 'disabled';
            }
            ?> required> <br>

            <label for="altura">Altura(m)</label> 
            <input type="number" id="altura" name="estatura" step="0.01" pattern="[0-9]+" placeholder="Ingresa tu altura en m" <?php 
            if(isset($_SESSION['modificarEstatura'])){
                echo 'value="'.$_SESSION['modificarEstatura'].'"';
                
            }else{
                echo 'disabled';
            }
            ?> required> <br>

            <input type="submit" name="modificar" value="Editar">

        </fieldset>
    </div>
</form>
</section>


</body>
</html>
<?php
elseif( !empty($_SESSION['IDpaciente']) ):
    header('location: /ProyectoNutricional/Vista/Html/panelpaciente.php');
    die();
else:
    header('location: /ProyectoNutricional/Vista/Html/login.php');
endif;
?>