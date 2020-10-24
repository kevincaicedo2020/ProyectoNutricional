<?php
namespace Modelo\Php;

class Alimento{
    
    public $nombreAlimento = "";
    public $kcalAlimento = 0;
    const GRAMO_ALIMENTO = 100;
    public $nombreCategoria = "";
    
    function __construct(string $nombreAlimento, int $kcalAlimento, string $nombreCategoria)
    {
        $this->nombreAlimento = $nombreAlimento;
        $this->kcalAlimento = $kcalAlimento;
        $this->nombreCategoria = $nombreCategoria;
    }


}

?>