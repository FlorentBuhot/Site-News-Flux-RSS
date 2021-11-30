<?php
    class FluxGateway{
        private $con;

        public function __construct(Connection $con){
            $this->con=$con;
        }

        
    }
?>