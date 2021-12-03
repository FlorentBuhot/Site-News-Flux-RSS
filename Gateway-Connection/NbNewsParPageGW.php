<?php
    class NbNewsParPageGW{
        private $con;

        public function __construct(Connection $con){
            $this->con=$con;
        }

        public function recupNbNewsPage(){
            $query = 'SELECT * FROM nbNewsPage';
            $this->con->executeQuery($query,array());
            $results = $this->con->getResults();
            return $results[0]['nbNewsPage'];
        }

        public function majNbNewsPage($nbNewsPage){
            $query = 'UPDATE nbnewspage SET nbNewsPage=:nbNewsPage';
            $this->con->executeQuery($query,array(
                ':nbNewsPage' => array($nbNewsPage,PDO::PARAM_INT)));
        }
    }
?>