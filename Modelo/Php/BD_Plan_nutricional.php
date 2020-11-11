<?php
namespace Modelo\Php;

trait BD_Plan_nutricional{

    public function calcular_calorias_diarias(){
        global$edad,$sexo,$peso,$estatura;
        str_replace(".","",$estatura);
            if($sexo=="M"){
                $resultado = ((10 * $peso)+(6.25 * (str_replace(".","",$estatura))) - (5 * $edad)+5);
            }
            else{
                $resultado = ((10 * $peso)+(6.25 * (str_replace(".","",$estatura)))- (5 * $edad)-161);
            }
            return $resultado;
    }

    public function calorias_diarias_totales(string $actividadfisica){
        $valor = $this->calcular_calorias_diarias();  
        switch($actividadfisica){
            case "ninguno":
                $valor1= $valor * 1.2;
            break;
            case "ligero":
                $valor1= $valor * 1.375;
            break;
            case "moderado":
                $valor1= $valor * 1.55;
            break;
            case "fuerte":
                $valor1= $valor * 1.725;
            break;
            case "muyfuerte":
                $valor1= $valor * 1.9;
            break;
        }
        return round($valor1);
    }

    public function calcular_proteinas_diarias($peso){
        return $peso * 2.2;
    }
    public function calcular_caloria_en_proteinas_diarias($caloria_proteina){
        return $caloria_proteina * 4;
    }

    public function calcular_grasa_diarias($peso){
        return $peso * 1;
    }
    public function calcular_caloria_en_grasa_diarias($caloria_grasa){
        return $caloria_grasa * 9;
    }
 
    public function calcular_carbohidrato_diarias($caloria_en_carbohidrato){
        return round($caloria_en_carbohidrato/4);
    }
    public function calcular_caloria_en_carbohidrato_diarias($caloria_total, $caloria_en_proteina, $caloria_en_grasa){
        return $caloria_total-$caloria_en_proteina-$caloria_en_grasa;
    }

    public function calcular_IMC(){
        global $peso,$estatura;
        return round((($peso/pow((str_replace(".","",$estatura)),2))*10000),1)  ;
    }

    public function rango_masa_corporal(){
        $masa = $this->calcular_IMC();
        switch($masa){
            case $masa<=18.5:
                return "Peso inferior al normal";
            break;
            case $masa>18.5 && $masa<=24.9 :
                return "Normal";
            break;
            case $masa>=25 && $masa<=29.9:
                return "Peso superior al normal";
            break;
            case $masa>29.9:
                return "Obesidad";
            break;
        }
    }


    
}
?>