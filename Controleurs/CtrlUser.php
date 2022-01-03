<?php
    class CtrlUser
    {
        public function __construct()
        {
            global $rep,$vues;
            $action = Nettoyage::NettoyageCarac($_REQUEST['action']);
            try {
                switch ($action) {
                    case NULL:
                    default:
                        $this->afficherNews();
                        break;
                }
            } catch (PDOException | Exception $e) {
                require($rep.$vues['erreur']);
            }
        }

        /**
         * Appèle le modèle pour afficher les news en fonction du nombre de news par page dans la base de données
         */
        function afficherNews(){
                global $rep,$vues;
                $mdlN = new ModelNews();
                $page = $_GET['page'];
                $nbNewsTot = $mdlN->getNbNewsTot();
                $nbNewsPage = $mdlN->getNbNewsPPage();
                $nbPageTot = ceil($nbNewsTot/$nbNewsPage);
                if(empty($page) || $page>$nbPageTot){
                    $page = 1;
                }
                $tnews = $mdlN->getNewsPage($page,$nbNewsPage);
                require($rep.$vues['vueNews']);
            }
    }
?>