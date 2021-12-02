<?php
    require_once('../Modèles/ModelAdmin.php');
    require_once('../Classes/Admin.php');
    require_once('../Classes/Nettoyage.php');

    $action = $_GET['action'];
    try{
        switch ($action){
            case NULL:
                afficherNewsNbNewsPPage();
                break;
            case "nbNewsPPage":
                majNbNewsPPage();
                break;
            case "supprimer":
                supprimerNews();
                break;
            default:
                break;
        }
    }
    catch(PDOException $e){
        require('../Vues/vueErreur.php');
    }
    
    function afficherNewsNbNewsPPage(){
        $mdlA = new ModelAdmin();
        $tnews = $mdlA->findNewsTotal();
        require('../Vues/vueAdmin.php');
    }

    function majNbNewsPPage(){
        if(isset($_POST['submitNbNews'])){
            $nbNewsPage = $_POST['nbNewsPage'];
            $nbNewsPage = Nettoyage::NettoyageNbNewsPage($nbNewsPage);
            $mdlA = new ModelAdmin();
            $mdlA->majNbNewsPage($nbNewsPage);
            afficherNewsNbNewsPPage();
        }   
    }
    
    function supprimerNews(){
        if(isset($_POST['submitNews'])){
            $sup = $_POST['supr'];
            $mdlA = new ModelAdmin();
            $mdlA->supprimerNews($sup);
            afficherNewsNbNewsPPage();
        }
    }
?>