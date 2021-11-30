<?php
    require('../Gateway-Connection/Connection.php');

    $base='mysql:host=localhost;dbname=newsbdd';
    $login='root';
    $mdp='';

    $newCon = new Connection($base,$login,$mdp);
?>