<?php
    require_once('../Classes/Nettoyage.php');
    require_once('../Classes/Validation.php');

    if(isset($_POST['submit'])){
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        $login = Nettoyage::NettoyageCarac($login);
        $mdp = Nettoyage::NettoyageCarac($mdp);


        //insere($login,$mdp);

        if(ValidationAdmin($login,$mdp)){
            require('../Controleurs/ctrlAdmin.php');
        }
        else{
            $message = 'Mot de passe incorrect';
            require('../Vues/vueConnexion.php');
        }
    }
?>