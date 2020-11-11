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

    <!-- TABLA QUE EL PACIENTE PODRA VER -->
    <link href="../Css/bootstrap.min.css" rel="stylesheet" />
    <script src="../Js/Jquery.js"></script>
    <script src="../Js/bootstrap.min.js"></script>

 



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

<div class="contenedor-tabla-datos">
    <h2>Plan nutricional Asignado</h2>
    <?php
    $conexion = mysqli_connect('localhost','kevin','kevinroot','nutricion');
    $resultado = mysqli_query($conexion,"select * from planNutricional where IDpaciente=".$_SESSION['IDpaciente'].";");
    $fila = mysqli_fetch_all($resultado);
    
    for( $i=count($fila)-1;$i>=0;$i--){
      $peso = $fila[$i][9];
     switch($peso){
       case ($peso)<18.5:
        $peso="Peso inferior al normal";
       break;
       case ($peso)>18.5 && ($peso)<=24.9:
        $peso="Normal";
       break;
       case ($peso)>=25 && ($peso)<=29.9:
        $peso="Peso superior al normal";
       break;
       case ($peso)>30:
        $peso="Obesidad";
       break;

     }
            echo "<table class='table'>
            <thead class='thead-dark'>
              <tr>
                <th scope='col'>N°".($i+1)." DATOS</th>
                <th scope='col'>RESULTADO</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>FECHA DE CREACION</td>
                <td><p>".$fila[$i][11]."</p></td>
              </tr>
              <tr>
                <td>CALORIAS DIARIA</td>
                <td><p>".$fila[$i][2]." Cal</p></td>
              </tr>
              <tr>
                <td>PROTEINAS DIARIA</td>
                <td><p>".$fila[$i][3]." g</p></td>
              </tr>
              <tr>
                <td>GRASA DIARIA</td>
                <td><p>".$fila[$i][4]." g</p></td>
              </tr>
              <tr>
                <td>CARBOHIDRATO DIARIO</td>
                <td><p>".$fila[$i][5]." g</p></td>
              </tr>
              <tr>
                <td>INDICE MASA CORPORAL</td>
                <td><p>".$peso."</p></td>
              </tr>
            </tbody>
          </table>";
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion); 
    ?>
      
    <a href="../Html/Aliemtos calorias.pdf" target="_blank"> <input type="submit" value="Calorias en Alimentos"> </a>




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