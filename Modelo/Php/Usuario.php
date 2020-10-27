<?php
namespace Modelo\Php;

 class Usuario{
    public $dniUsuario = 0;
    public $nombreUsuario = "";
    public $edadUsuario = 0;
    public $sexoUsuario = "";
    public $telefonoUsuario = 0;
    public $emailUsuario = "";

        public function __construct(int $dniUsuario, string $nombreUsuario, int $edadUsuario, string $sexoUsuario, int $telefonoUsuario, string $emailUsuario)
        {
            $this->dniUsuario = $dniUsuario;
            $this->nombreUsuario = $nombreUsuario;
            $this->edadUsuario = $edadUsuario;
            $this->sexoUsuario = $sexoUsuario;
            $this->telefonoUsuario = $telefonoUsuario;
            $this->emailUsuario = $emailUsuario;
        }


}


?>