<?php

namespace Modelo\Php;
use Modelo\Php\Usuario;
class Nutricionista extends Usuario{

    function __construct(int $dniUsuario, string $nombreUsuario, int $edadUsuario, string $sexoUsuario, int $telefonoUsuario, string $emailUsuario, 
    bool $tipoDeUsuario){
        parent:: __construct($dniUsuario, $nombreUsuario, $edadUsuario, $sexoUsuario, $telefonoUsuario, $emailUsuario, $tipoDeUsuario);
    }

}
?>