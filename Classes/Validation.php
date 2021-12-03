<?php
    class Validation{
        public static function ValidationAdmin($login,$mdp){
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