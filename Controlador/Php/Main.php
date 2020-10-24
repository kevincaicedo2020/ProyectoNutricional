<?php

require_once("../../autoload.php");
use Modelo\Php\Paciente;
use Modelo\Php\Nutricionista;
use Modelo\Php\PlanNutricional;
use Modelo\Php\Alimento;
$paciente1 = new Paciente(12345,"kelly",22,"M",2727103,"kevin@gmail.com",true, 56, 1.5);
$nutri = new Nutricionista(12345,"kelly",22,"M",2727103,"kevin@gmail.com",true);
$planNutri = new PlanNutricional(1.1,1.2,1.3,1.4,1.5,1.6,1.7,1.8,1.9);
$comida = new Alimento("comida", 15, "patata");



?>