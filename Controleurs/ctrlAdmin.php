<?php

    class CtrlAdmin{

        function __construct()
        {
            global $rep,$vues;
            try{
                $action = Nettoyage::NettoyageCarac($_REQUEST['action']);
                switch ($action)
                {
                    case NULL:
                        require_once($rep.$vues['erreur']);
                        break;
                    case 'afficher':
                        $this->acceuilAdmin();
                        break;
                    case "nbNewsPPage":
                        $this->majNbNewsPPage();
                        break;
                    case "supprimer":
                        $this->supprimerNews();
                        break;
                    case "newNews":
                        $this->ajouterNews();
                        break;
                    case "seConnecter":
                        $this->connection();
                        break;
                    case "seDeconnecter":
                        $this->deconnexion();
                        break;
                    default:
                        break;
                }
            }
            catch (PDOException | Exception $e){
                require($rep.$vues['erreur']);
            }
        }


        /**
         * Appèle le modèle pour afficher les news du site
         */
        function acceuilAdmin()
    {
        global $rep,$vues;
        $mdlA = new ModelAdmin();
        $tnews = $mdlA->findNewsTotal();
        require($rep.$vues['vueAdmin']);
    }

        /**
         * Appèle le modèle pour mettre à jour le nombre de news par page
         */
        function majNbNewsPPage()
    {
        if (isset($_POST['submitNbNews'])) {
            $nbNewsPage = $_POST['nbNewsPage'];
            $nbNewsPage = Nettoyage::NettoyageInt($nbNewsPage);
            $mdlA = new ModelAdmin();
            $mdlA->majNbNewsPage($nbNewsPage);
            $this->acceuilAdmin();
        }
    }

        /**
         * Fonction qui appèle le modèle pour supprimer des nws
         */
        function supprimerNews()
    {
        if (isset($_POST['submitNews'])) {
            $sup = $_POST['supr'];
            $mdlA = new ModelAdmin();
            $mdlA->supprimerNews($sup);
            $this->acceuilAdmin();
        }
    }

        /**
         * Fonction qui permet d'appeler le modèle pour ajouter une news 
         */
        function ajouterNews()
    {
        if (isset($_POST['submitNewNews'])) {
            $titre = Nettoyage::NettoyageCarac($_POST['titre']);
            $url = Nettoyage::NettoyageCarac($_POST['url']);
            $date = Nettoyage::NettoyageCarac($_POST['date']);
            echo $date;
            //$date = Nettoyage::NettoyageCarac($_POST['date']);
            $nomSite = Nettoyage::NettoyageCarac($_POST['nomSite']);
            $lienImg = Nettoyage::NettoyageCarac($_POST['lienImg']);
            $mdlA = new ModelAdmin();
            $mdlA->ajouterNews($titre, $url, $date, $nomSite, $lienImg);
            $this->acceuilAdmin();
        }
    }

        /**
         * Fonction qui permet d'appeler le modèle pour se connecter
         */
        public function connection(){
            global $rep,$vues;
            if (isset($_POST['submit'])){
                $login = Nettoyage::NettoyageCarac($_POST['login']);
                $mdp = Nettoyage::NettoyageCarac($_POST['mdp']);
                $mdlA = new ModelAdmin();
                //$mdlA->inserer($login,$mdp);
                if ($mdlA->connection($login, $mdp)){
                    $this->acceuilAdmin();
                }
                else{
                    $message = 'Un des champs est incorrect';
                    require($rep.$vues['vueConec']);
                }
            }
            else{
                require($rep.$vues['vueConec']);
            }
        }

        /**
         * Fonction qui permet d'appeler le model pour se déconnecter
         */
        public function deconnexion(){
            global $rep,$vues;
            $mdlA = new ModelAdmin();
            $mdlA->deconnexion();
            $_REQUEST['action'] = null;
            new CtrlUser();
        }
}
?>