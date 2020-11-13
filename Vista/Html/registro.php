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
    <link rel="stylesheet" href="../Css/loginYregistroñ.css" type="text/css" >
    <!-- ARCHIVOS PARA HACER LAS VALIDACIONES DE DATOS EN LOS FORMUALRIOS -->
    <script src="../Js/Jquery.js"></script>
    <script src="../Js/validacionesDatos.js" ></script>

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


        <div class="centar_contenido cuadro_extra">
            <div class="texto">
                <h2 class="texto_lista">REGISTRO DE USUARIO</h2>
            </div>
   

            <input type="radio" name="nada_importante" id="selecciona_paciente" checked="checked">
            <input type="radio" name="nada_importante" id="selecciona_nutricionista">
          
            <label for="selecciona_paciente" class="input_submit boton_usuario1">
                <p>PACIENTE</p>
            </label>
            
            <label for="selecciona_nutricionista" class="input_submit boton_usuario2">
                <p>NUTRICIONISTA</p>
            </label>



            <div class="seccion_paciente">
            <div class="formulario">
            <form action="../../Controlador/Php/Mregistros_usuario.php" method="POST">
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-id-card icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" name="cedula"  placeholder="Ingresa tu cedula" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-bookmark icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="text" class="input_campo" name="nombre" placeholder="Ingresa tu nombre" pattern="[A-Za-z]+" required>
                    <hr>
                </div>
            </div>    
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-list-ol icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" name="edad" max="200" placeholder="Ingresa tu edad" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="campo ">
                <div class="icon adicional">
                    <label for="Fpaciente"><i class="fas fa-female icono icono_grande"></i></label>
                    <input type="radio" name="sexo" value="F" required id="Fpaciente">
                </div>
                <div class="icon adicional">
                    <label for="Mpaciente"><i class="fas fa-male icono icono_grande"></i></label>
                    <input type="radio" name="sexo" value="M" required id="Mpaciente">
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-tty icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" name="telefono" placeholder="Ingresa tu telefono" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-at icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="email" class="input_campo" name="email" placeholder="Ingresa tu email" required>
                    <hr>
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-weight icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" name="peso" placeholder="Ingresa tu peso(Kg)" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="far fa-calendar-alt icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" step="0.01" name="estatura" placeholder="Ingresa tu estatura(m)" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="submit">
                <input type="submit" class="input_submit" id="enviar-datos" name="paciente" value="ENVIAR DATOS DE PACIENTE">
            </div>
        </form>
    </div>
        </div>

        <div class="seccion_nutricionista">
                    <div class="formulario">
                    <form action="../../Controlador/Php/Mregistros_usuario.php" method="POST">
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-id-card icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" name="cedula"  placeholder="Ingresa tu cedula" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-bookmark icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="text" class="input_campo" name="nombre" placeholder="Ingresa tu nombre" pattern="[A-Za-z]+" required>
                    <hr>
                </div>
            </div>    
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-list-ol icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" name="edad" placeholder="Ingresa tu edad" max="200" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="campo ">
                <div class="icon adicional">
                    <label for="Fnutricionista"><i class="fas fa-female icono icono_grande"></i></label>
                    <input type="radio" name="sexo" value="F" required id="Fnutricionista">
                </div>
                <div class="icon adicional">
                    <label for="Mnutricionista"><i class="fas fa-male icono icono_grande"></i></label>
                    <input type="radio" name="sexo" value="M" required id="Mnutricionista">
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-tty icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="number" class="input_campo" name="telefono" placeholder="Ingresa tu telefono" pattern="[0-9]+" required>
                    <hr>
                </div>
            </div>
            <div class="campo">
                <div class="icon">
                    <i class="fas fa-at icono"></i>
                </div>
                <div class="campo_lista">
                    <input type="email" class="input_campo" name="email" placeholder="Ingresa tu email" required>
                    <hr>
                </div>
            </div>
            <div class="submit">
                <input type="submit" class="input_submit" name="nutricionista" value="ENVIAR DATOS DE NUTRICIONISTA">
            </div>
        </div>
    </form>
</div>
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