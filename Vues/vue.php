<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>News</title>
        <link href="CSS/vue.css" rel="stylesheet">
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
                        <img src='image/logo_admin' width="50" height="50">
                        <a href='Vues/vueConnexion.php'>Connexion administrateur</a>
                    </div>
                </div>
            </div>
            <div class='mid'>
                <div class='news'>
                    <h2>News : </h2>
                    <?php if(isset($tnews)){?>
                    <ul>
                        <li>
                            <span class='teteTab'>Date</span>
                            <span class='teteTab'>Site</span>
                            <span class='teteTabDroit'>Titre</span>
                        </li>
                    </ul>
                    <div>
                        <ul>
                            <?php 
                            foreach($tnews as $row){ ?>
                                <li>
                                    <a href=<?php echo $row->getUrl()?>>
                                        <span class='date'>&nbsp<?php echo $row->getDate() ?></span>
                                        <img class='lienImg' src='<?php echo $row->getLienImg()?>'>
                                        <span class='nom'>&nbsp<?php echo $row->getNomSite() ?></span>
                                        <span class='titre'>&nbsp<?php echo $row->getTitre()?></span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </diV>
                    <?php 
                    }
                    else{
                        echo '<p>Pas de News</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="bot">
                <?php
                if($nbPageTot == 1){?>
                    <h5 class='seul'>Page : &nbsp<?php echo $page;?>/<?php echo $nbPageTot?></h5>
                <?php    
                }
                elseif($page == $nbPageTot){ ?>
                    <a class='lien_droit_seul' href='index.php?page=<?php echo $page-1; ?>'><&nbsp Page &nbsp<?php echo $page-1?></a>
                    <h5 class='milieu_seul'>Page : &nbsp<?php echo $page;?>/<?php echo $nbPageTot?></h5>
                <?php
                }
                elseif($page>1){?>
                    <a class='lien_gauche' href='index.php?page=<?php echo $page-1; ?>'><&nbspPage &nbsp<?php echo $page-1?></a>
                    <h5 class='milieu'>Page : &nbsp<?php echo $page;?>/<?php echo $nbPageTot?></h5>
                    <a class='lien_droit' href="index.php?page=<?php echo $page+1; ?>">Page &nbsp<?php echo $page+1?>></a>
                <?php
                }
                else{ ?>
                    <h5 class='milieu_seul'>Page : &nbsp<?php echo $page;?>/<?php echo $nbPageTot?></h5>
                    <a  class='lien_gauche_seul' href="index.php?page=<?php echo $page+1; ?>">Page &nbsp<?php echo $page+1; ?>&nbsp></a>
                <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>