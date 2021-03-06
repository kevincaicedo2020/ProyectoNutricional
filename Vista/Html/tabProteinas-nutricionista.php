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

    <!-- archivos jquery para calcular las proteinas panel nutricionista -->
    <script src="../Js/Jquery.js"></script>
    <script src="../Js/proteinasdiarias.js"></script>


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

<!-- calculadora de proteinas diarias -->
<div class="proteinas">
    <h2>Proteinas Diarias</h2>
    <div class="contenedor-proteinas">
        <label for="peso">Peso(Kg):</label>
        <input type="text" id="peso" name="peso" placeholder="ejemplo 54"> <br>
        <label for="actividad">Actividad Fisica:</label>
        <select name="opcion" id="opcion">
            <option value="1">Sedentario</option>
            <option value="2">Atletico</option>
            <option value="3">Resistencia</option>
            <option value="4">Fuerza</option>
        </select> <br>
        <div class="resultado-gramos">
            <p id="resul-gramos">
                Proteinas Diarias: <span> ...... </span> gramos
            </p>
        </div>
    </div>
    <input type="button" id="calcular" value="Calcular" >
 
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