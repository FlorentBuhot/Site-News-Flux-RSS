<?php
    //chargement config de la config
    require_once(__DIR__.'/config/config.php');

    //chargement autoloader pour l'autochargement des classes
    require_once(__DIR__.'/config/Autoload.php');
    Autoload::charger();

    $cont = new CtrlNews();
?>