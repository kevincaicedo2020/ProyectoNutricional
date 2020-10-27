<?php

namespace Modelo\Php;
use Modelo\Php\Usuario;
use Modelo\Php\BD_Nutricion;
class Nutricionista extends Usuario{

    use \Modelo\Php\BD_Nutricion;

    public function __construct(int $dniUsuario, string $nombreUsuario, int $edadUsuario, string $sexoUsuario, int $telefonoUsuario, string $emailUsuario){
        parent:: __construct($dniUsuario, $nombreUsuario, $edadUsuario, $sexoUsuario, $telefonoUsuario, $emailUsuario);
    }

}
?>