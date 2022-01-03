<?php
    class Admin{
        private string $login;
        private string $role;

        /**
         * @param string $login
         * @param string $role
         */
        public function __construct(string $login, string $role){
            $this->login = $login;
            $this->role = $role;
        }
        
        public function getLogin(){
            return $this->login;
        }
    
        public function setLogin(string $login){
            $this->login =$login;
        }

        public function getRole(): string
        {
            return $this->role;
        }

        public function setRole(string $role): void
        {
            $this->role = $role;
        }
    }
?>