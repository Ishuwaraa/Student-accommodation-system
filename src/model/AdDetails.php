<?php

    class AdDetails {
        public $id;
        public $bed;
        public $bath;
        public $category;
        public $phone;
        public $price;
        public $description;
        public $location;
        public $status;

        public function __construct(){}

        public function setId($id){
            $this->id = $id;
        }
        public function setBed($bed){
            $this->bed = $bed;
        }
        public function setBath($bath){
            $this->bath = $bath;
        }
        public function setCategory($category){
            $this->category = $category;
        }
        public function setPhone($phone){
            $this->phone = $phone;
        }
        public function setPrice($price){
            $this->price = $price;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function setLocation($location){
            $this->location = $location;
        }
        public function setStaus($status){
            $this->status = $status;
        }
        
        public function getId(){
            return $this->id;
        }
        public function getBed(){
            return $this->bed;
        }
        public function getBath(){
            return $this->bath;
        }
        public function getCategory(){
            return $this->category;
        }
        public function getPhone(){
            return $this->phone;
        }
        public function getPrice(){
            return $this->price;
        }
        public function getDescription(){
            return $this->description;
        }
        public function getLocation(){
            return $this->location;
        }
        public function getStatus(){
            return $this->status;
        }
    }
?>