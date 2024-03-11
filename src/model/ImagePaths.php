<?php

    class ImagePaths{
        private $image;

        public function __construct(){}
        
        public function setImage($image){
            $this->image = $image;
        }

        public function getImage(){
            return $this->image;
        }
    }
?>