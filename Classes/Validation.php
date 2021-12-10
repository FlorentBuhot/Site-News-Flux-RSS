<?php
    class Validation{
        public static function insere($login,$mdp){
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
    }

?>