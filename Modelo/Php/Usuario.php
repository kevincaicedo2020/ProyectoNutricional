<?php
namespace Modelo\Php;

 abstract class Usuario{
    public $dniUsuario = 0;
    public $nombreUsuario = "";
    public $edadUsuario = 0;
    public $sexoUsuario = "";
    protected $telefonoUsuario = 0;
    protected $emailUsuario = "";
    protected $tipoDeUsuario;

        function __construct(int $dniUsuario, string $nombreUsuario, int $edadUsuario, string $sexoUsuario, int $telefonoUsuario, string $emailUsuario, 
        bool $tipoDeUsuario)
        {
            $this->dniUsuario = $dniUsuario;
            $this->nombreUsuario = $nombreUsuario;
            $this->edadUsuario = $edadUsuario;
            $this->sexoUsuario = $sexoUsuario;
            $this->telefonoUsuario = $telefonoUsuario;
            $this->emailUsuario = $emailUsuario;
            $this->tipoDeUsuario = $tipoDeUsuario;
        }


}


?>