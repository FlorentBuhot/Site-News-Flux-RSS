<?php
    class CtrlUser
    {
        public function __construct()
        {
            global $rep,$vues;
            $action = $_GET['action'];
            try {
                switch ($action) {
                    case NULL:
                        $this->afficherNews();
                        break;
                    default:
                        break;
                }
            } catch (PDOException $e) {
                require($rep.$vues['erreur']);
            } catch (Exception $e) {
                require($rep.$vues['erreur']);
            }
        }

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