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
    <link rel="stylesheet" href="../Css/estilospanel.css">
    <link rel="stylesheet" href="../Css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Lato:wght@300&family=Pacifico&display=swap" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="../Img/logo5.png" />
    <!-- para los iconos automaticamente de la red se enlasan   -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- CALCULADORA IMC -->
    <script src="../Js/Jquery.js"></script>
    <script src="../Js/funciones.js"></script>

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

<!-- CALCULADORA IMC -->
<div class="cuadroimc"> 
    <div class="container">
        <div class="imc-title">
            <h1>TABLA DE IMC</h1>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="form-group">
                    <label>Peso (Kg):</label>
                    <input type="number" id="txtPeso" class="form-control" placeholder="ejemplo 54">
                </div>
                <div class="form-group">
                    <label>Talla (m):</label>
                    <input type="number" id="txtTalla" class="form-control" placeholder="ejemplo 165">
                </div>
                <div class="botones2">
                    <button type="button" class="btn" onclick="calcular()">Calcular</button>
                    <button type="reset" class="btn" onclick="cancelar()">Cancelar</button>
                </div>
            </div>
        </div>
        <div class="row" id="resultado">
            <div class="col-lg-12 col-xs-12">
                <div class="form-group">
                    <label>IMC</label>
                    <h4 id="imc" style="color:#ffffff;">estado</h4>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <h4 id="estado" style="color:#c90303;">estado</h4>
                </div>
            </div>
        </div> 
    </div>

    <!-- TABLA DE IMC DATOS -->
    <div class="tab-peso">
        <table >
            <thead class="tab-encabezado">
                <tr>
                    <th>IMC</th>
                    <th>ESTADO</th>
                </tr>
            </thead>
            <tbody class="tab-datos">
                <tr>
                    <td>menor 16.00</td>
                    <td>Infrapeso: Delgadez Severa</td>
                </tr>
                <tr>
                    <td>16.00 - 16.99</td>
                    <td>Infrapeso: Delgadez moderada</td>
                </tr>
                <tr>
                    <td>17.00 - 18.49</td>
                    <td>Infrapeso: Delgadez aceptable</td>
                </tr>
                <tr>
                    <td>18.50 - 24.99</td>
                    <td>Peso normal</td>
                </tr>
                <tr>
                    <td>25.00 - 29.99</td>
                    <td>Sobrepeso</td>
                </tr>
                <tr>
                    <td>30.00 - 34.99</td>
                    <td>Obesidad tipo l</td>
                </tr>
                <tr>
                    <td>35.00 - 40.00</td>
                    <td>Obesidad tipo ll</td>
                </tr>
                <tr>
                    <td>mayor 40.00</td>
                    <td>Obesidad tipo lll</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="elimc">
        <h3>Cómo se mide el IMC</h3>
        <div class="textimc">
        <p>La formula del IMC es el peso en kilogramos dividido por el cuadro de la altura en metros(Kg/m2).</p>
        <p>El IMC es una indicación simple de la relación entre el peso y la talla que se utiliza frecuentemente para identificar el sobrepeso y la obesidad en los adultos, tanto a nivel individual como poblacional.</p>
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