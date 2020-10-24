<?php 
trait todoDeSql{

    public function conexionBD(string $localhost, string $usuarioBD, string $contraseñaBD, string $nombreBD){
        $conexion = mysql_connect($localhost, $usuarioBD, $contraseñaBD);
        return $conexion;
    }
    

}

?>