<?php
namespace Modelo\Php;
use Modelo\Php\Usuario;
use Modelo\Php\BD_Nutricion;
use Modelo\Php\BD_Plan_nutricional;

class Paciente extends Usuario{
    use \Modelo\Php\BD_Nutricion;
    use \Modelo\Php\BD_Plan_nutricional;
    public $pesoKg = 0;
    public $alturaM = 0;
    private $contraseña =""; 
    public function __construct(int $dniUsuario, string $nombreUsuario, int $edadUsuario, string $sexoUsuario, int $telefonoUsuario, string $emailUsuario
    ,int $pesoKg, float $alturaM)
    {
        parent:: __construct($dniUsuario, $nombreUsuario, $edadUsuario, $sexoUsuario, $telefonoUsuario, $emailUsuario);
        $this->pesoKg = $pesoKg;
        $this->alturaM = $alturaM;
    }

    /*public function mostrar(){
        return "el dni es: ".$this->dniUsuario. " el nombre es: ".$this->nombreUsuario. " el edad es: ".$this->edadUsuario. " el sexo es: ".$this->sexoUsuario. " el telefono es: ".$this->telefonoUsuario. " el email es: ".$this->emailUsuario. " el usuario es: ".$this->tipoDeUsuario. " el peso es: ".$this->pesoKg. " el estatura es: ".($this->alturaM+1.5);
    }*/
}
?>