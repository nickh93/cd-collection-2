<?php
class CD {

    private $band;
    private $album;
    private $year;
    private $image;

    function __construct($cd_band, $cd_album, $cd_year, $cd_image) {
        $this->band = $cd_band;
        $this->album = $cd_album;
        $this->year = $cd_year;
        $this->image = $cd_image;
    }

    function setBand($cd_band){
        $this->band = (string) $cd_band;
    }
    function getBand(){
        return $this->band;
    }

    function setAlbum($cd_album){
        $this->album = (string) $cd_album;
    }
    function getAlbum(){
        return $this->album;
    }

    function setYear($cd_year){
        $this->year = (int) $cd_year;
    }
    function getYear(){
        return $this->year;
    }

    function setImage($cd_image){
        $this->image = (string) $cd_image;
    }
    function getImage(){
        return $this->image;
    }

    function save(){
      array_push($_SESSION['list_of_cds'], $this);
    }

    static function getAll(){
        return $_SESSION['list_of_cds'];
    }

}
?>
