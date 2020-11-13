<?php
session_start();
if( !empty($_SESSION['IDnutricionista']) ):
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Usuarios</title>
    <link rel="stylesheet" href="../Css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Gayathri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belleza&family=Lato:wght@300&family=Pacifico&display=swap" rel="stylesheet">
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
    
                    <div class="contenedor-grid-listado-usuario">
                        <div class="texto_usuario">
                            <div class="text034">
                                <p>Lista de usuarios</p>
                            </div>
                        </div>
                        <?php
    $conexion = mysqli_connect('localhost','kevin','kevinroot','nutricion');
    $resultado = mysqli_query($conexion,"select * from paciente where IDnutricionista=".$_SESSION['IDnutricionista'].";");
    $fila = mysqli_fetch_all($resultado);
    
    for( $i=0;$i<count($fila);$i++){
     
    echo "<div class='num_cedula'>
            <p>".($i+1)."</p>
        </div>

        <div class='con_datos_pacientes'>
        <div>
            <p>Cedula: ".$fila[$i][1]."</p>
            <p>Nombre: ".$fila[$i][2]."</p>
            <p>Edad: ".$fila[$i][3]."</p>
            <p>Sexo: ".$fila[$i][4]."</p>
            <p>Telefono: ".$fila[$i][5]."</p>
        </div>
        <div>
            <p>Email: ".$fila[$i][6]."</p>
            <p>Fecha creación: ".$fila[$i][7]."</p>
            <p>Peso: ".$fila[$i][10]."</p>
            <p>Estatura: ".$fila[$i][11]."</p>
        </div>
        </div>";
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion); 
    ?>
                     

                    </div>
    </div >

    





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