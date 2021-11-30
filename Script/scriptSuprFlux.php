<?php

if(empty($_POST['submit'])){
    require('scriptAdmin.php');
}

if(isset($_POST['submit'])){
    $spr = $_POST['spr'];
    foreach ($spr as $row) {
        print($row);
    }
}
else{
    require('scriptAdmin.php');
}

?>