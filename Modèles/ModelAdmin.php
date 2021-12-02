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
            return $nbNPGW->findNewsTotal();
        }

        public function majNbNewsPage($nbNewsPage){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NbNewsPPageGW($newCon);
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
    }
?>