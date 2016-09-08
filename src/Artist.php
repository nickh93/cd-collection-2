<?php
    class Artist
    {
        private $cd;
        private $image;

        function __construct($artist_cd, $artist_image){
            $this->$cd = array();
            $this->$image = $artist_image;
        }
        function setCD($artist_cd){
            $this->cd = (string) $artist_cd;
        }
        function getCD(){
            return $this->cd;
        }
        function setImg($artist_image){
            $this->image = (string) $artist_image;
        }
        function getCD(){
            return $this->image;
        }
    }
?>
