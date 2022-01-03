<?php
    class NewsGateway{
        private $con;

        public function __construct(Connection $con){
            $this->con=$con;
        }

        public function findAllNews(){
            $query = 'SELECT * FROM tnews';
            $this->con->executeQuery($query,array());
            $results = $this->con->getResults();
            foreach ($results as $row) {
                $resultsFin[] = new News($row['id'],$row['url'],$row['titre'], (string)$row['date'],$row['nomSite'],$row['lienImg']);
            }
            return $resultsFin;
        }

        public function findNews($page, $nbNewsPage){
            $query = 'SELECT * FROM tnews LIMIT :id, :nbNews';
            $idDeb = ceil(($page-1)*$nbNewsPage);
            $this->con->executeQuery($query,array(
                ':id'=>array($idDeb,PDO::PARAM_INT),
                ':nbNews'=>array($nbNewsPage,PDO::PARAM_INT)
            ));
            $results = $this->con->getResults();
            foreach ($results as $row) {
                $resultsFin[] = new News($row['id'],$row['url'],$row['titre'], (string)$row['date'],$row['nomSite'],$row['lienImg']);
            }
            return $resultsFin;
        }

        public function nbNews(){
            $query = 'SELECT COUNT(*) c FROM tnews';
            $this->con->executeQuery($query,array());
            $results = $this->con->getResults();
            return $results[0]['c'];
        }

        public function supprimerNews($sup){
            $query = 'DELETE FROM tnews WHERE id=:id';
            $this->con->executeQuery($query,array(
                ':id' => array($sup,PDO::PARAM_INT)));
        }

        public function inseretNews($news){
            $query = "INSERT INTO tnews VALUES(':titre',':url',NULL,':date',':nomSite',':lienImg')";
            $this->con->executeQuery($query,array(
                ':titre'=>array($news->getTitre(),PDO::PARAM_STR),
                ':url'=>array($news->getUrl(),PDO::PARAM_STR),
                ':date'=>array($news->getDate(),PDO::PARAM_STR),
                ':nomSite'=>array($news->getNomSite(),PDO::PARAM_STR),
                ':lienImg'=>array($news->getLienImg(),PDO::PARAM_STR)
            ));
        }
    }
?>