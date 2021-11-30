<?php
    require('../Classes/Nettoyage.php');
    require('../Gateway-Connection/NbNewsPageGateway.php');
    require('../Gateway-Connection/Connection.php');


    $base='mysql:host=localhost;dbname=newsbdd';
    $login='root';
    $mdp='';
    $exception = false;

    if(isset($_GET['submit'])){
        $nbNewsPage = $_GET['nbNewsPage'];

        $nbNewsPage = NetooyageNbNewsPage($nbNewsPage);
        try{
        $nbNPGW = new NbNewsPageGateway(new Connection($base,$login,$mdp));
        $nbNPGW->majNbNewsPage($nbNewsPage);
        }
        catch(PDOException $e){
            $exception = true;
        }
        if($exception){
            require('../Vues/vueErreur.php');
        }
        else{
            require('../Script/scriptAdmin.php');
        }
    }
?>