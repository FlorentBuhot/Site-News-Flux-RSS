<?php
    class AdminGateway{
        private $con;

        public function __construct(Connection $con){
            $this->con=$con;
        }

        public function recupAdmin(string $login){
            $query = 'SELECT * FROM admin WHERE login=:login';
            $this->con->executeQuery($query,array(
                ':login'=>array($login,PDO::PARAM_STR)
            ));
            $results = $this->con->getResults();
            foreach ($results as $row){
                $retour[] = array($row['login'],$row['mdp'],'admin');
            }
            if(empty($retour)){
                return null;
            }
            else{
                return $retour[0];
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