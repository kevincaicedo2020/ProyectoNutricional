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
                    <h4 id="imc" style="color:blue;">estado</h4>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <h4 id="estado" style="color:red;">estado</h4>
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