<?php
session_start();
if(!empty($_SESSION['IDpaciente'])):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULADORA IMC</title>
    <link rel="stylesheet" href="../Css/PesoIdealPlan.css">
    <link rel="stylesheet" href="../Css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Lato:wght@300&family=Pacifico&display=swap" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="../Img/logo5.png" />
    <!-- para los iconos automaticamente de la red se enlasan   -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- PESO IDEAL -->
    <script src="../Js/Jquery.js"></script>
    <script src="../Js/pesoIdeal-planNutricional.js"></script>

</head>
<body>
<!-- MENU -->
<nav id="navegacion">
    <div id="menutoogle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
        <ul id="menu">
            <p class="centradop">CUIDAMOS DE TI</p>
            <a href="panelpaciente.php">
                <li> <i class="fas fa-2x fa-male"> </i> Tabla de IMC</li></a>
            <a href="PlanNutricional.php">
                <li> <i class="far fa-2x fa-clipboard"> </i> Plan Nutricional Asignado</li></a>
            <a href="pesoIdeal.php">
                <li> <i class="fas fa-2x fa-heartbeat"> </i> Peso Ideal</li></a>
            <a href="proteinasdiarias.php">
                <li> <i class="fas fa-2x fa-apple-alt"> </i> Proteinas Diarias</li></a>
            <a href="../../Modelo/Php/cierresession.php">
                <li> <i class="far fa-2x fa-times-circle"> </i> CIERRE DE SESION </li></a>
                <p class="nombre"> <i class="fas fa-file-signature nombre"></i> <?php echo 'Nombre de Usuario: '.$_SESSION['nombrePaciente']; ?></p>
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
    elseif(!empty($_SESSION['IDnutricionista'])):
        header('location: /ProyectoNutricional/Vista/Html/registro.php');
        die();
    else:
        header('location: /ProyectoNutricional/Vista/Html/login.php');
    endif;
?>