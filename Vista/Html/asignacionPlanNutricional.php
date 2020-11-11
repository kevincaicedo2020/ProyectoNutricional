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
    <link rel="stylesheet" href="../Css/estilos-plan-nutricional.css">


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

<section class="contenedor-asignacionPlan">
<form action="../../Controlador/Php/McrearPlanNutricional.php" method="POST">
    <label for="cedulaPaciente">Cedula Paciente:</label>
    <i class="fas fa-search"> </i><input  type="number" id="cedulaPaciente" name="buscar" placeholder="230007225-3" pattern="[0-9]+" required>  </i> 
    

    <fieldset id="fielset_actividadesDiarias">
        <legend>Actividad Fisica Diaria </legend>

        <input type="radio" id="ninguno" name="ninguno" value="ninguno" required>
        <label for="ninguno">Poco o Ninguno</label>

        <input type="radio" id="ligero" name="ninguno" value="ligero" required>
        <label for="ligero">Ejercicio ligero(1-3 dias a la semana)</label> <br>


        <input type="radio" id="moderado" name="ninguno" value="moderado" required>
        <label for="moderado">Ejercicio moderado(3-5 dias a la semana)</label>


        <input type="radio" id="fuerte" name="ninguno" value="fuerte" required>
        <label for="fuerte">Ejercicio fuerte(6-7 dias a la semana)</label> 


        <input type="radio" id="muyfuerte" name="ninguno" value="muyfuerte" required>
        <label for="muyfuerte">Ejercicio muy fuerte(2 veces al dias entrenamiento intenso)</label>

    </fieldset>

    <input type="submit" id="cedulaBuscar" name="Buscador" value="Buscar">
</form>
    <div class="contenedor-planAsignado">

        <div class="contenedor-hijo1">
            <table class="tabla-nutricionista">
                <thead class="encabezo-tabla">
                <tr>
                    <th >DATOS</th>
                    <th >RESULTADO</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Nombre Paciente</td>
                    <td> <!--<input type="text" id="paciente-proteinasD" /> --><label id="paciente-proteinasD"><?php 
                    if(isset($_SESSION['nombrepaciente'])){
                        echo $_SESSION['nombrepaciente'];
                        }?></td>
                </tr>
                <tr>                                        <!--AQUI IRAN VARIABLES SESSIONES PARA MOSTRAR LOS RESULTADOS -->
                    <td id="caloria">Calorias Diarias</td>
                    <td> <!--<input type="text" id="paciente-caloriasD" />--> <label id="paciente-caloriasD"><?php 
                    if(isset($_SESSION['caloria_total'])){
                        echo $_SESSION['caloria_total'];
                        }?></label></td>
                </tr>
                <tr>
                    <td>Proteinas Diarias</td>
                    <td> <!--<input type="text" id="paciente-proteinasD" /> --><label id="paciente-proteinasD"><?php 
                    if(isset($_SESSION['proteina_total'])){
                        echo $_SESSION['proteina_total'];
                        }?></td>
                </tr>
                <tr>
                    <td>Grasa Diarias</td>
                    <td><!-- <input type="text" id="paciente-grasaD" />--> <label id="paciente-grasaD"><?php 
                    if(isset($_SESSION['grasa_total'])){
                        echo $_SESSION['grasa_total'];
                        }?></td>
                </tr>
                <tr>
                    <td>Carboidrato Diario</td>
                    <td> <!--<input type="text" id="paciente-carboidratosD" />--> <label id="paciente-carboidratosD"><?php 
                    if(isset($_SESSION['carbohidrato_total'])){
                        echo $_SESSION['carbohidrato_total'];
                        }?></td>
                </tr>
                <tr>
                    <td>Indice de Masa Corporal</td>
                    <td><!-- <input type="text" id="paciente-masa" />--> <label id="paciente-masa"><?php 
                    if(isset($_SESSION['IMC'])){
                        echo $_SESSION['IMC'];
                        }?></td>
                </tr>
                </tbody>
            </table>
        </div>
    
        <div class="contenedor-hijo2">
        <form action="../../Controlador/Php/McrearPlanNutricional.php" method="GET">      <!--POR AHORA ESTO ESTA DUDOSO DEL FUNCIONAMIENTO-->
            <input type="submit" id="borrar-datos-paciente" name="borrar_todo" value="Borrar"> <br>
        </form>
            <a href="Aliemtos calorias.pdf" target="_blank" > <input type="submit" id="ver-pdf" value="Aliemtos en (kcal)"> </a> 
            <a href="Alimentos en Gramos.pdf" target="_blank" > <input type="submit" id="ver-pdf" value="Proteinas en (g)"> </a> 
        </div>
    

    </div>


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