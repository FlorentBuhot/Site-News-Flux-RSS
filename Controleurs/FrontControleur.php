<?php

class FrontControleur{
    function __construct()
    {
        $listeAction = array(
            'admin' => array('afficher','nbNewsPPage','supprimer','newNews','seConnecter','seDeconnecter'),
            'user' => array()
        );

        try {
            $admin = ModelAdmin::isAdmin();
            $test = false;

            $action = $_GET['action'];
            foreach ($listeAction['admin'] as $actionA){
                if($action == $actionA){
                    $test = true;
                }
            }
            if($test == true){
                if($admin == null){
                    $action = 'seConnecter';
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
        catch (Exception $e){
        }
    }
}