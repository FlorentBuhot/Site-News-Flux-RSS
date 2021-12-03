<?php
    class ModelNews{
        public function getNbNewsTot(){
            global $base,$login,$mdp;
            $newCon = new Connection($base,$login,$mdp);
            $newsGW = new NewsGateway($newCon);
            return $newsGW->nbNews();
        }

        public function getNbNewsPPage(){
            global $base,$login,$mdp;
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NbNewsParPageGW($newCon);
            return $nbNPGW->recupNbNewsPage();
        }

        public function getNewsPage($page,$nbNewsPage){
            global $base,$login,$mdp;
            $newCon = new Connection($base,$login,$mdp);
            $nbNPGW = new NewsGateway($newCon);
            return $nbNPGW->findNews($page,$nbNewsPage);
        }
    }
?>