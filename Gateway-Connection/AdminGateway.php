<?php
    class AdminGateway{
        private $con;

        public function __construct(Connection $con){
            $this->con=$con;
        }

        public function recupAdmin(string $login){
            $query = 'SELECT mdp FROM admin WHERE login=:login';
            $this->con->executeQuery($query,array(
                ':login'=>array($login,PDO::PARAM_STR)
            ));
            $results = $this->con->getResults();
            if(empty($results)){
                return null;
            }
            else{
                return $results[0]['mdp'];
            }
        }

        public function nouvelAdmin(string $login, string $mdp){
            $query='INSERT INTO admin VALUES(:login,:mdp)';
            $this->con->executeQuery($query,array(
                ':login'=>array($login,PDO::PARAM_STR),
                ':mdp'=>array($mdp,PDO::PARAM_STR)
            ));
        }
    }
?>