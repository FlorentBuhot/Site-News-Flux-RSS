<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>News</title>
        <link href="../CSS/vueAdmin.css" rel="stylesheet">
    </head>

    <body>
        <div class="main">
            <div class="head">
                <div class="logo">
                    <img src="../image/index.png" width="50" height="50">
                    <div class="logo_name">News</div>
                </div>
                <div class='top_Droit'>
                    <div class='admin'>
                        <img src='../image/menu.png' width="50" height="50">
                        <a href='../Script/script.php?page=1'>Menu principal</a>
                    </div>
                </div>
            </div>
            <div class="coeur">
                <div class="vide">
                </div>
                <div class="milieu">
                    <h3>Nombre de News par page :</h3>
                    <form action="scriptAdmin.php" method="get">
                        <input type="text" name="nbNewsPage">
                        <input type="submit" name="submit" value="Valider">
                    </form>
                    <h3 class="Flux">Flux</h3> 
                    <form class="scroller" action="../Script/scriptAdmin.php" method="post">
                            <?php
                            foreach($tnews as $row){ ?>
                                    <input class="nav_list"  name='supprime' type="checkbox" value="<?php echo $row->getTitre()?>"> 
                                    &nbsp<?php echo $row->getDate()?>
                                    &nbsp<?php echo $row->getNomSite()?>
                                    &nbsp<?php echo $row->getTitre()?></br>
                            <?php
                            }
                            ?>
                        <input name="submit" type="submit" value="Supprimer">
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