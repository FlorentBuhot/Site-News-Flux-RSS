<?php
    class Admin{
        private string $login;
        private string $mdp;

        public function __construct(string $login, string $mdp){
            $this->login = $login;
            $this->mdp = $mdp;
        }
    
        public function getLogin(){
            return $this->login;
        }
    
        public function setLogin(string $login){
            $this->login =$login;
        }
    
        public function getMdp(){
            return $this->mdp;
        }
    
        public function setmdp(string $mdp){
            $this->mdp =$mdp;
        }
    }
?>