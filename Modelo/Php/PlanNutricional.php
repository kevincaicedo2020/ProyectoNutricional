<?php
namespace Modelo\Php;
use Modelo\Php\BD_Nutricion;
use Modelo\Php\BD_Plan_nutricional;
class PlanNutricional{
    use \Modelo\Php\BD_Plan_nutricional;
    use \Modelo\Php\BD_Nutricion;
    public $actividadDiaria = 0;
    public $caloriaDiaria = 0;
    public $proteinaDiaria = 0;
    public $grasaDiaria = 0;
    public $carbohidratoDiaria = 0;
    public $caloriaDeProteina = 0;
    public $caloriaDeGrasa = 0;
    public $caloriaDeCarbohidrato = 0;
    public $IMC = 0;

    function __construct(string $actividadDiaria, float $caloriaDiaria, float $proteinaDiaria, float $grasaDiaria, float $carbohidratoDiaria, 
    float $caloriaDeProteina, float $caloriaDeGrasa, float $caloriaDeCarbohidrato, float $IMC)
    {
        $this->actividadDiaria = $actividadDiaria;
        $this->caloriaDiaria = $caloriaDiaria;
        $this->proteinaDiaria = $proteinaDiaria;
        $this->grasaDiaria = $grasaDiaria;
        $this->carbohidratoDiaria = $carbohidratoDiaria;
        $this->caloriaDeProteina = $caloriaDeProteina;
        $this->caloriaDeGrasa = $caloriaDeGrasa;
        $this->caloriaDeCarbohidrato = $caloriaDeCarbohidrato;
        $this->IMC = $IMC;
    }



}

?>