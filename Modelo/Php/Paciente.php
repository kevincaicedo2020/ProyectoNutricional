<?php
namespace Modelo\Php;
use Modelo\Php\Usuario;

class Paciente extends Usuario{
    public $pesoKg = 0;
    public $alturaM = 0;

    function __construct(int $dniUsuario, string $nombreUsuario, int $edadUsuario, string $sexoUsuario, int $telefonoUsuario, string $emailUsuario, 
    bool $tipoDeUsuario,int $pesoKg, float $alturaM)
    {
        parent:: __construct($dniUsuario, $nombreUsuario, $edadUsuario, $sexoUsuario, $telefonoUsuario, $emailUsuario, $tipoDeUsuario);
        $this->pesoKg = $pesoKg;
        $this->alturaM = $alturaM;
    }

    public function mostrar(){
        return "el dni es: ".$this->dniUsuario. " el nombre es: ".$this->nombreUsuario. " el edad es: ".$this->edadUsuario. " el sexo es: ".$this->sexoUsuario. " el telefono es: ".$this->telefonoUsuario. " el email es: ".$this->emailUsuario. " el usuario es: ".$this->tipoDeUsuario. " el peso es: ".$this->pesoKg. " el estatura es: ".($this->alturaM+1.5);
    }
}
?>