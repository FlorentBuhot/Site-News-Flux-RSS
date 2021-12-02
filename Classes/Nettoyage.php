<?php
class Nettoyage{
	public static function NettoyageCarac($chaine){
		if (isset($chaine)){
			return filter_var($chaine, FILTER_SANITIZE_STRING);
		}
	}
	
	public static function NettoyageNbNewsPage($nbNewsPage){
		if(isset($nbNewsPage)){
			return filter_var($nbNewsPage,FILTER_VALIDATE_INT);
		}
	}
}
?>