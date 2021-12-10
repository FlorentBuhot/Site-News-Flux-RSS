<?php
    class ModelAdmin{
        public function findNewsTotal(){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            return $nbNPGW->findNewsTotal();
        }

        public function majNbNewsPage($nbNewsPage){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NbNewsParPageGW($newCon);
            return $nbNPGW->majNbNewsPage($nbNewsPage);
        }

        public function supprimerNews($sup){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            foreach ($sup as $news) {
                $nbNPGW->supprimerNews($news);
            }
        }

        public function ajouterNews($titre,$url,$date,$nomSite,$lienImg){
            $news = new News((int)NULL,$titre,$url,$date,$nomSite,$lienImg);
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $newsGW = new NewsGateway($newCon);
            $newsGW->inserer($news);
        }

        public function connection($login, $mdp){
            $base='mysql:host=localhost;dbname=newsbdd';
            $loginbd='root';
            $mdpbdd='';
            $adminGW = new AdminGateway(new Connection($base,$loginbd,$mdpbdd));
            $adminTest = $adminGW->recupAdmin($login);
            if(password_verify($mdp, $adminTest[1])){
                $_SESSION['role']='admin';
                $_SESSION['login']=$login;
                return true;
            }
            else{
                return false;
            }
        }

        public function deconnexion(){
            session_unset();
            session_destroy();
            $_SESSION = array();
        }

        public static function isAdmin(){
            if(isset($_SESSION['login']) && isset($_SESSION['role'])){
                $login = Nettoyage::NettoyageCarac($_SESSION['login']);
                $role = Nettoyage::NettoyageCarac($_SESSION['role']);
                return	new	Admin($login,$role);
            }
            else return null;
        }
    }
?>