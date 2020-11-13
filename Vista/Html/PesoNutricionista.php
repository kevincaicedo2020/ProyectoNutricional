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
    <link rel="stylesheet" href="../Css/planNutricionista.css">

    <!-- archivos jquery para calcular IMC INDICE DE MASA CORPORAL panel nutricionista -->
    <script src="../Js/Jquery.js"></script>
    <script src="../Js/pesoIdeal-planNutricional.js"></script>



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
                                <a href="listadoUsuarios.php">
                                <li> <i class="fas fa-th-list"></i> Listado de Usuarios</li></a>
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






<!-- PESO IDEAL DE UNA PERSONA -->
<div class="contenedor-pesoIdeal">
    <h2>CALCULA TU PESO IDEAL</h2>
    <div class="datos-persona">
        <label for="estatura">Estatura (m):</label>
        <input type="text" id="estatura" name="estatura" placeholder="ejemplo 165"> <br>

        <label for="edad">Edad:</label>
        <input type="text" id="edad" name="edad" placeholder="ejemplo 23"> <br>

        <label for="contextura">Contextura:</label>
        <select name="opcion" id="opcion">
            <option value="1">Delgado</option>
            <option value="2">Normal</option>
            <option value="3">Ancho</option>
        </select> <br>

            <p id="resultado-peso">
                El peso Ideal: <span>  ......  </span> Kg
            </p>



        <input type="submit" value="Calcular" id="calcular">



    </div>
</div>








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