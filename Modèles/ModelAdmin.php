<?php
    require_once('../Classes/Admin.php');
    require_once('../Classes/News.php');
    require_once('../Gateway-Connection/Connection.php');
    require_once('../Gateway-Connection/NewsGateway.php');
    require_once('../Gateway-Connection/NbNewsPPageGW.php');

    class ModelAdmin{
        public function findNewsTotal(){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            $newCon = NULL;
            return $nbNPGW->findNewsTotal();
        }

        public function majNbNewsPage($nbNewsPage){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NbNewsPPageGW($newCon);
            $newCon = NULL;
            return $nbNPGW->majNbNewsPage($nbNewsPage);
        }

        public function supprimerNews($sup){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            $newCon = NULL;
            foreach ($sup as $news) {
                $nbNPGW->supprimerNews($news);
            }
        }
    }
?>