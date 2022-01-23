<?php
    class ModelAdmin{
        public function findNewsTotal(){
            global $base,$login,$mdp;
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            return $nbNPGW->findAllNews();
        }

        public function majNbNewsPage($nbNewsPage){
            global $base,$login,$mdp;
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NbNewsParPageGW($newCon);
            return $nbNPGW->majNbNewsPage($nbNewsPage);
        }

        public function supprimerNews($sup){
            global $base,$login,$mdp;
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            foreach ($sup as $news) {
                $nbNPGW->supprimerNews($news);
            }
        }

        public function ajouterNews($titre,$url,$date,$nomSite,$lienImg){
            global $base,$login,$mdp;
            $news = new News((int)NULL,$titre,$url,$date,$nomSite,$lienImg);
            $newCon = new Connection($base,$login,$mdp);
            $newsGW = new NewsGateway($newCon);
            $newsGW->insertNews($news);
        }

        public function connection($loginA, $mdpA){
            global $base,$login,$mdp;
            $adminGW = new AdminGateway(new Connection($base,$login,$mdp));
            $mdpTest = $adminGW->recupAdmin($loginA); // login unique
            if(password_verify($mdpA, $mdpTest)){
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
            if($_SESSION['role']=="admin"){
                $login = Nettoyage::NettoyageCarac($_SESSION['login']);
                $role = Nettoyage::NettoyageCarac($_SESSION['role']);
                return	new	Admin($login,$role);
            }
            else return null;
        }

        public function inserer($loginA, $mdpA){
            global $base,$login,$mdp;
            $adminGW = new AdminGateway(new Connection($base,$login,$mdp));
            $mdpTest = $adminGW->nouvelAdmin($loginA,$mdpA); // login unique
        }
    }
?>