<?php
    class News{
        private int $id;
        private string $url;
        private string $titre;
        private string $date;
        private string $nomSite;
        private string $lienImg;

        public function __construct($id, $url, $titre, $date, $nomSite, $lienImg){
            $this->id = $id;
            $this->url = $url;
            $this->titre = $titre;
            $this->date = $date;
            $this->nomSite = $nomSite;
            $this->lienImg = $lienImg;
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function setId(string $id){
            $this->id = $id;
        }

        public function getUrl(): string
        {
            return $this->url;
        }

        public function setUrl(string $url){
            $this->url = $url;
        }

        public function getTitre(): string
        {
            return $this->titre;
        }

        public function setTitre(string $titre){
            $this->titre = $titre;
        }

        public function getDate(): string
        {
            return $this->date;
        }

        public function setDate(string $date){
            $this->date = $date;
        }

        public function getLienImg(): string
        {
            return $this->lienImg;
        }

        public function setLienImg(string $lienImg){
            $this->lienImg = $lienImg;
        }

        public function getNomSite(): string
        {
            return $this->nomSite;
        }

        public function setNomSite(string $nomSite){
            $this->nomSite = $nomSite;
        }
    }
?>