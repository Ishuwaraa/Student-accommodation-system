<?php

    class AdDetails {
        private $id;
        private $bed;
        private $bath;
        private $category;
        private $phone;
        private $price;
        private $description;
        private $location;
        private $status;
        private $landlord;
        private $latitude;
        private $longitude;
        private $rejectReason;

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
        public function setLandlord($landlord){
            $this->landlord = $landlord;
        }
        public function setLatitude($latitude){
            $this->latitude = $latitude;
        }
        public function setLongitude($longitude){
            $this->longitude = $longitude;
        }
        public function setRejectReason($rejectReason){
            $this->rejectReason = $rejectReason;
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
        public function getLandlord(){
            return $this->landlord;
        }
        public function getLatitude(){
            return $this->latitude;
        }
        public function getLongitude(){
            return $this->longitude;
        }
        public function getRejectReason(){
            return $this->rejectReason;
        }
    }
?>