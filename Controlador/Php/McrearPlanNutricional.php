<?php
require_once("../../autoload.php");
session_start();
use Modelo\Php\PlanNutricional;
use Modelo\Php\Paciente;
use Modelo\Php\Nutricionista;
$buscar = $_POST['Buscador'];
$IDbuscador = (int) $_POST['buscar'];
$actividadFisica = (string) $_POST['ninguno'];

if( isset($_POST['Buscador']) ){
    $INSnutricionista = new Nutricionista($IDbuscador,$_SESSION['nombreNutricionista'],$_SESSION['edadNutricionista'],$_SESSION['sexoNutricionista'],$_SESSION['telefonoNutricionista'],$_SESSION['emailNutricionista']);
    if($INSnutricionista->validarDatos($buscar)){

        $datos = $INSnutricionista->verificar_num_de_cedula_ver_que_tipo_es($IDbuscador,1);
            $codigo  = $datos['IDpaciente'];
            $cedula  = $datos['DNIpaciente'];
            $nombre  = $datos['nombrePaciente'];
            $edad  = $datos['edadPaciente'];
            $sexo  = $datos['sexoPaciente'];
            $telefono  = $datos['telefonoPaciente'];
            $email  = $datos['emailPaciente'];
            $peso  = $datos['pesoPaciente'];
            $estatura  = $datos['estaturaPaciente'];
        $paciente = new Paciente($cedula,$nombre,$edad,$sexo,$telefono,$email,$peso,$estatura);

        $caloria_total = $paciente->calorias_diarias_totales($actividadFisica);

        $proteina_total =$paciente->calcular_proteinas_diarias($peso);
        $caloria_en_proteina = $paciente->calcular_caloria_en_proteinas_diarias($proteina_total);

        $grasa_total =$paciente->calcular_grasa_diarias($peso);
        $caloria_en_grasa =$paciente->calcular_caloria_en_grasa_diarias($grasa_total);
        
        $caloria_en_carbohidrato =$paciente->calcular_caloria_en_carbohidrato_diarias($caloria_total, $caloria_en_proteina, $caloria_en_grasa);
        $carbohidrato_total =$paciente->calcular_carbohidrato_diarias($caloria_en_carbohidrato);

        $IMC =$paciente->calcular_IMC();
        $letra_IMC = $paciente->rango_masa_corporal();

        $_SESSION['nombrepaciente']=$nombre;
        $_SESSION['caloria_total']=$caloria_total;
        $_SESSION['proteina_total']=$proteina_total;
        $_SESSION['grasa_total']=$grasa_total;
        $_SESSION['carbohidrato_total']=$carbohidrato_total;
        $_SESSION['IMC']=$letra_IMC;
        
        $planNutricional = new PlanNutricional($actividadFisica, $caloria_total, $proteina_total, $grasa_total, $carbohidrato_total, $caloria_en_proteina, $caloria_en_grasa, $caloria_en_carbohidrato, $IMC);
        $conexion = $planNutricional->conexion_a_la_BD();
        $resultado = mysqli_query($conexion, 'Insert into planNutricional (actividadDiaria,caloriaDiaria,proteinaDiaria,grasaDiaria,carbohidratoDiario,caloriaDeProteina,caloriaDeGrasa,caloriaDeCarbohidrato,IMC,IDpaciente,fechaPlanNutricional) values ("'.$actividadFisica.'",'.$caloria_total.','.$proteina_total.','.$grasa_total.','.$carbohidrato_total.','.$caloria_en_proteina.','.$caloria_en_grasa.','.$caloria_en_carbohidrato.','.$IMC.','.$codigo.',CURDATE());');
        $planNutricional->ver_si_conexion_BD_fue_exitosa($resultado,"asignacionPlanNutricional.php");
        $planNutricional->cerrar_a_la_BD($resultado,$conexion);
        //header('location: ../../Vista/Html/asignacionPlanNutricional.php');
    }



}elseif( isset($_GET['borrar_todo']) ){
Paciente::eliminar_variables_nutricion();
header('location: ../../Vista/Html/asignacionPlanNutricional.php');
}




?>