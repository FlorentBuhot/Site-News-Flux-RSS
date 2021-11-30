<?php
    require_once("../Gateway-Connection/Connection.php");
    require_once('../Gateway-Connection/NewsGateway.php');
    require_once('../Gateway-Connection/NbNewsPageGateway.php');
    require_once('../Classes/News.php');
    require_once('../Classes/Nettoyage.php');
    

    
    $base='mysql:host=localhost;dbname=newsbdd';
    $login='root';
    $mdp='';
    try{
        $newCon = new Connection($base,$login,$mdp);
        $exception = false;

        $newsGW = new NewsGateway($newCon);
        $tnews = $newsGW->findNewsTotal();


        if(isset($_GET['submit'])){
            $nbNewsPage = $_GET['nbNewsPage'];
            $nbNewsPage = NetooyageNbNewsPage($nbNewsPage);
            $nbNPGW = new NbNewsPageGateway($newCon);
            $nbNPGW->majNbNewsPage($nbNewsPage);
            
            if($exception){
                require('../Vues/vueErreur.php');
            }
            else{
                require('../Vues/vueAdmin.php');
            }
        }   
    }
    catch(PDOException $e){
        $exception = true;
    }
    require('../Vues/vueAdmin.php');

?>