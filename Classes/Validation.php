<?php
    require_once("../Gateway-Connection/Connection.php");
    require_once("../Gateway-Connection/AdminGateway.php");
    require_once("../Classes/Admin.php");

    class Validation{
        public static function NettoyageLogin($login){
            if (isset($login)){
                return filter_var($login, FILTER_SANITIZE_STRING);
            }
        }
        
        public static function Nettoyagemdp($mdp) {
            if (isset($mdp)) {
                return filter_var($mdp, FILTER_SANITIZE_STRING);
            }
        }
        
        public static function NetooyageNbNewsPage($nbNewsPage){
            if(isset($nbNewsPage)){
                return filter_var($nbNewsPage,FILTER_VALIDATE_INT);
            }
        }
    }

    function ValidationAdmin($login,$mdp){
        try{
            $base='mysql:host=localhost;dbname=newsbdd';
            $loginbd='root';
            $mdpbdd='';
            $adminGW = new AdminGateway(new Connection($base,$loginbd,$mdpbdd));
            $adminTest = $adminGW->recupAdmin($login);

            if(password_verify($mdp, $adminTest->getMdp())){
                return true;
            }
            else{
                return false;
            }
        }
        catch(PDOException $e){
            require('../Vues/vueErreur.php');
        }
    }

    function insere($login,$mdp){
        try{
            $base='mysql:host=localhost;dbname=newsbdd';
            $loginbd='root';
            $mdpbdd='';
            $adminGW = new AdminGateway(new Connection($base,$loginbd,$mdpbdd));
            $adminGW->nouvelAdmin($login, password_hash($mdp, PASSWORD_DEFAULT));
        }
        catch(PDOException $e){
            require('../Vues/vueErreur.php');
        }
    }
?>