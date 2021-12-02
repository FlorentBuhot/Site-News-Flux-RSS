<?php
class Nettoyage{
	public static function NettoyageLogin($login){
		if (isset($login)){
			return filter_var($login, FILTER_SANITIZE_STRING);
		}
	}
	
	public static function Nettoyagemdp($mdp) {
		if (isset($mdp)) {
			return filter_var($mdp, FILTER_SANITIZE_STRING);
		}
	}
	
	public static function NettoyageNbNewsPage($nbNewsPage){
		if(isset($nbNewsPage)){
			return filter_var($nbNewsPage,FILTER_VALIDATE_INT);
		}
	}
}
?>