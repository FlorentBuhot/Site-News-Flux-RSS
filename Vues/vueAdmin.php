<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>News</title>
        <link href="CSS/vueAdmin.css" rel="stylesheet">
    </head>

    <body>
        <div class="main">
            <div class="head">
                <div class="logo">
                    <img src="image/index.png" width="50" height="50">
                    <div class="logo_name">News</div>
                </div>
                <div class='top_Droit'>
                    <div class='admin'>
                        <img src='image/menu.png' width="50" height="50">
                        <a href='index.php?action=seDeconnecter'>Menu principal</a>
                    </div>
                </div>
            </div>
            <div class="coeur">
                    <div class="nbNews">
                        <h3>Nombre de News par page :</h3>
                        <form action="index.php?action=nbNewsPPage" method="post">
                            <input type="text" name="nbNewsPage">
                            <input type="submit" name="submitNbNews" value="Valider">
                        </form>
                    </div>
                    <div class="listeFlux">
                        <h3>Flux : </h3>
                        <form action="index.php?action=supprimer" method="post">
                                <?php
                                if(isset($tnews)){
                                foreach($tnews as $row){ ?>
                                        <input class="nav_list"  name='supr[]' type="checkbox" value="<?php echo $row->getId()?>">
                                        &nbsp<?php echo $row->getDate()?>
                                        &nbsp<?php echo $row->getNomSite()?>
                                        &nbsp<?php echo $row->getTitre()?></br>
                                <?php
                                }
                                }
                                else{?>
                                    <h4>Pas de Flux</h4>
                                <?php
                                }
                                ?>
                            <input class="input" type="submit" name="submitNews" value="Supprimer">
                        </form>

                    </div>
                    <div class="newNews">
                        <h3>Insérer un Flux : </h3>
                        <form class="newNewsForm" action="index.php?action=newNews" method="post">
                            <table>
                                <tr>
                                    <td>Titre :</td>
                                    <td><input class="champs" type="text" name="titre"></td>
                                </tr>
                                <tr>
                                    <td>URL :</td>
                                    <td><input class="champs" type="text" name="url"></td>
                                </tr>
                                <tr>
                                    <td>Date :</td>
                                    <td><input class="champs" type="date" name="date"></td>
                                </tr>
                                <tr>
                                    <td>Nom du site :</td>
                                    <td><input class="champs" type="text" name="nomSite"></td>
                                </tr>
                                <tr>
                                    <td>Lien du logo du site (option) :</td>
                                    <td><input class="champs" type="text" name="lienImg"></td>
                                </tr>
                            </table>
                            <input class="input" type="submit" name="submitNewNews" value="Valider">
                        </form>
                    </div>
                <div class="vide">
                </div>
            </div>           
            <div class="bot">
            </div>
        </div>
    </body>
</html>