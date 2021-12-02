<?php
    require_once('../Modèles/ModelNews.php');
    require_once('../Classes/News.php');

    $action = $_GET['action'];
    try{
        switch ($action){
            case NULL:
                afficherNews();
                break;
            default:
                # code...
                break;
        }
    }
    catch(PDOException $e){
        require('../Vues/vueErreur.php');
    }
    catch(Exception $e){
        require('../Vues/vueErreur.php');
    }

    function afficherNews(){
        $mdlN = new ModelNews();
        $page = $_GET['page'];
        $nbNewsTot = $mdlN->getNbNewsTot();
        $nbNewsPage = $mdlN->getNbNewsPPage();
        $nbPageTot = ceil($nbNewsTot/$nbNewsPage);
        if(empty($page) || $page>$nbPageTot){
            $page = 1;
        }
        $tnews = $mdlN->getNewsPage($page,$nbNewsPage);
        require('../Vues/vue.php');
    }
?>