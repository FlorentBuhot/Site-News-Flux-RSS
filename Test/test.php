
<?php
//chargement config de la config
require_once('../Config/config.php');

//chargement autoloader pour l'autochargement des classes
require_once('../Config/Autoload.php');
Autoload::charger();

try {
    $data = new SimpleXMLElement('https://www.jeuxvideo.com/rss/rss.xml',0,true,"",false);

    $mdlaA = new ModelAdmin();

    foreach ($data->channel->item as $item){
        $mdlaA->ajouterNews($item->title,$item->link,'',$data->channel->title,'');
    }

} catch (Exception $e) {
}
catch (PDOException $e){
    print($e->getMessage());
}
?>
