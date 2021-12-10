<?php

    class CtrlAdmin{

        function __construct()
        {
            global $rep,$vues;
            session_start();
            try{
                $action = $_GET['action'];
                switch ($action)
                {
                    case NULL:
                        require_once($rep.$vues['erreur']);
                        break;
                    case 'afficher':
                        $this->afficherNewsNbNewsPPage();
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
            catch
            (PDOException $e)
            {
                require($rep.$vues['erreur']);
            }
        }

    
    function afficherNewsNbNewsPPage()
    {
        global $rep,$vues;
        $mdlA = new ModelAdmin();
        $tnews = $mdlA->findNewsTotal();
        require($rep.$vues['vueAdmin']);
    }

    function majNbNewsPPage()
    {
        if (isset($_POST['submitNbNews'])) {
            $nbNewsPage = $_POST['nbNewsPage'];
            $nbNewsPage = Nettoyage::NettoyageNbNewsPage($nbNewsPage);
            $mdlA = new ModelAdmin();
            $mdlA->majNbNewsPage($nbNewsPage);
            $this->afficherNewsNbNewsPPage();
        }
    }
    
    function supprimerNews()
    {
        if (isset($_POST['submitNews'])) {
            $sup = $_POST['supr'];
            $mdlA = new ModelAdmin();
            $mdlA->supprimerNews($sup);
            $this->afficherNewsNbNewsPPage();
        }
    }

    function ajouterNews()
    {
        if (isset($_POST['submitNewNews'])) {
            $titre = Nettoyage::NettoyageCarac($_POST['titre']);
            $url = Nettoyage::NettoyageCarac($_POST['url']);
            $date = Nettoyage::NettoyageCarac($_POST['date']);
            $nomSite = Nettoyage::NettoyageCarac($_POST['nomSite']);
            $lienImg = Nettoyage::NettoyageCarac($_POST['lienImg']);
            $mdlA = new ModelAdmin();
            $mdlA->ajouterNews($titre, $url, $date, $nomSite, $lienImg);
            $this->afficherNewsNbNewsPPage();
        }
    }

        public function connection(){
            global $rep,$vues;
            if (isset($_POST['submit'])){
                $login = Nettoyage::NettoyageCarac($_POST['login']);
                $mdp = Nettoyage::NettoyageCarac($_POST['mdp']);
                //insere($login,$mdp);
                $mdlA = new ModelAdmin();
                if ($mdlA->connection($login, $mdp)){
                    $this->afficherNewsNbNewsPPage();
                }
                else{
                    $message = 'Un des champs est    incorrect';
                    require($rep.$vues['vueConec']);
                }
            }
            else{
                require($rep.$vues['vueConec']);
            }
        }

        public function deconnexion(){
            $mdlA = new ModelAdmin();
            $mdlA->deconnexion();
        }
}
?>