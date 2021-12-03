<!DOCTYPE html>
<html lang="fr">
    
    <head>
        <meta charset="UTF-8">
        <title>News</title>
        <link href="CSS/vueConnexion.css" rel="stylesheet">
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
                        <a href='Controleurs/CtrlNews.php'>Menu principal</a>
                    </div>
                </div>
            </div>
            <div class="coeur">
                <div class="vide">
                </div>
                <div class="login">
                    <h3 class="connection">Connexion</h3>
                    <p><?php 
                    if(isset($message)){
                        echo $message;
                    }?>
                    </p>
                    <form action="index.php" method="post">
                        <table>
                            <tr>
                                <td>
                                    <label>Login</label>
                                </td>
                                <td>
                                    <input class="input" type="text" name="login"/>
                                </td>    
                            </tr>
                            <tr>
                                <td>
                                    <label>Mot de passe</label>
                                </td>
                                <td>
                                    <input class="input" type="password" name="mdp"/>
                                </td>
                            </tr>
                        </table>
                        <input name="submit" type="submit" value="Valider">
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