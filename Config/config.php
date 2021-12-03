<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$base='mysql:host=localhost;dbname=newsbdd';
$login='root';
$mdp='';

//Vues

$vues['erreur']='Vues/vueErreur.php';
$vues['vueNews']='Vues/vue.php';
$vues['vueConec']='Vues/vueConnexion.php';
$vues['vueAdmin']='Vues/vueAdmin.php';


?>