
<?php
try {
    $data = new SimpleXMLElement('https://www.jeuxvideo.com/rss/rss.xml',0,true,"",false);

    foreach ($data->channel->item as $item){
        $tNews[] = new News(0, $item->link, $item->title,'',$data->channel->title,'');
    }

} catch (Exception $e) {

}
catch (PDOException $e){
    print($e->getMessage());
}
?>
