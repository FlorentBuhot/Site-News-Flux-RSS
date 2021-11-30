<?php
    class News{
        private int $id;
        private string $url;
        private string $titre;
        private string $date;
        private string $nomSite;
        private string $lienImg;

        public function __construct(string $id, string $url, string $titre, string $date,string $nomSite,string $lienImg){
            $this->id = $id;
            $this->url = $url;
            $this->titre = $titre;
            $this->date = $date;
            $this->nomSite = $nomSite;
            $this->lienImg = $lienImg;
        }

        public function getId(){
            return $this->id;
        }

        public function setId(string $id){
            $this->id = $id;
        }

        public function getUrl(){
            return $this->url;
        }

        public function setUrl(string $url){
            $this->url = $url;
        }

        public function getTitre(){
            return $this->titre;
        }

        public function setTitre(string $titre){
            $this->titre = $titre;
        }

        public function getDate(){
            return $this->date;
        }

        public function setDate(string $date){
            $this->date = $date;
        }

        public function getLienImg(){
            return $this->lienImg;
        }

        public function setLienImg(string $lienImg){
            $this->lienImg = $lienImg;
        }

        public function getNomSite(){
            return $this->nomSite;
        }

        public function setNomSite(string $nomSite){
            $this->nomSite = $nomSite;
        }
    }
?>