<?php

    function autoloadd($clase){
        
        $url=str_replace("\\","/",$clase.".php");
        
        require_once($url);
    }


    spl_autoload_register('autoloadd');
?>