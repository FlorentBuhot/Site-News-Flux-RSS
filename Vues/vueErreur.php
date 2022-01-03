<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>News</title>
        <link href="CSS/vueErreur.css" rel="stylesheet">
    </head>

    <body>
        <div class="main">
            <div class="head">
                <div class="logo">
                    <img src="image/index.png" width="50" height="50">
                    <div class="logo_name">News</div>
                </div>
                <div class='admin'>
                    
                </div>
            </div>

            <div class="nav_list">
                <h2>Une erreur est survenue</h2>
                <p>
                </br></br></br>
                    <?php
                    if(isset($e)) {
                        print($e->getMessage());
                    }
                    else{
                        print("Une erreur inattendue est apparue");
                    }?>
                </p>
            </div>
            <div class='bot'>
                <a class='milieu_seul' href='index.php'>Retour à la page d'acceuil</a>
            </div>
        </div>
    </body>
</html>