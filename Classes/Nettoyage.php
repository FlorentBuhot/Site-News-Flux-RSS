<?php
class Nettoyage{
    /**
     * @param $chaine
     * @return chaine nettoyée
     */
    public static function NettoyageCarac($chaine){
		if (isset($chaine)){
			return filter_var($chaine, FILTER_SANITIZE_STRING);
		}
	}

    /**
     * @param $int
     * @return 
     */
    public static function NettoyageInt($int){
		if(isset($int)){
			return filter_var($int,FILTER_VALIDATE_INT);
		}
	}
}
?>