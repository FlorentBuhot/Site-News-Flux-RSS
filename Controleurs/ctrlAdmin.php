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
                        $this->connection();
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

        public function connection()
        {
            global $rep,$vues;
            if (isset($_POST['submit']))
            {
                $login = $_POST['login'];
                $mdp = $_POST['mdp'];

                $login = Nettoyage::NettoyageCarac($login);
                $mdp = Nettoyage::NettoyageCarac($mdp);

                //insere($login,$mdp);

                if (Validation::ValidationAdmin($login, $mdp))
                {
                    $this->afficherNewsNbNewsPPage();
                }

                else{
                    $message = 'Mot de passe incorrect';
                    require($rep.$vues['vueConec']);
                }
            }
            else{
                require($rep.$vues['vueConec']);
            }
        }
}
?>