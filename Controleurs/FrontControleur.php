<?php

class FrontControleur{
    function __construct()
    {
        global $rep,$vues;
        $listeActionAdmin = array('afficher','nbNewsPPage','supprimer','newNews','seConnecter','seDeconnecter');

        session_start();

        try {
            $admin = ModelAdmin::isAdmin();
            $test = false;
            $action = Nettoyage::NettoyageCarac($_REQUEST['action']);
            if(in_array($action,$listeActionAdmin)){
                if($admin == null){
                    $_REQUEST['action'] = 'seConnecter';
                    new CtrlAdmin();
                }
                else{
                    new CtrlAdmin();
                }
            }
            else{
                new CtrlUser();
            }
        }
        catch (Exception | PDOException $e){
            require($rep.$vues['erreur']);
        }
    }
}