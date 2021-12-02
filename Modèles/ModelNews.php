<?php
    require_once('../Classes/News.php');
    require_once('../Gateway-Connection/Connection.php');
    require_once('../Gateway-Connection/NewsGateway.php');
    require_once('../Gateway-Connection/NbNewsPPageGW.php');

    class ModelNews{
        public function getNbNewsTot(){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $newsGW = new NewsGateway($newCon);
            return $newsGW->nbNews();
        }

        public function getNbNewsPPage(){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NbNewsPPageGW($newCon);
            return $nbNPGW->recupNbNewsPage();
        }

        public function getNewsPage($page,$nbNewsPage){
            $base='mysql:host=localhost;dbname=newsbdd';
            $login='root';
            $mdp='';
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            return $nbNPGW->findNews($page,$nbNewsPage);
        }
    }
?>