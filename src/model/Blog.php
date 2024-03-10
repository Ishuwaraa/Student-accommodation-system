<?php

    class Blog{
        public $id;
        public $title;
        public $description;
        public $image;

        public function __construct(){}

        public function setId($id){
            $this->id = $id;
        }
        public function setTitle($title){
            $this->title = $title;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function setImage($image){
            $this->image = $image;
        }

        public function getTitle(){
            return $this->title;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getImage(){
            return $this->image;
        }
        public function getId(){
            return $this->id;
        }
    }
?>