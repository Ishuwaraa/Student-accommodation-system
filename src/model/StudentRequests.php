<?php
    class StudentRequest {
        private $id;
        private $ad_id;
        private $std_name;
        private $std_contact;
        private $status;
        private $location;
        private $price;
        private $landlord_contact;

        public function __construct(){}

        public function setId($id) {
            $this->id = $id;
        }
        public function setAdId($ad_id) {
            $this->ad_id = $ad_id;
        }
        public function setStdName($std_name) {
            $this->std_name = $std_name;
        }
        public function setStdContact($std_contact) {
            $this->std_contact = $std_contact;
        }
        public function setStatus($status) {
            $this->status = $status;
        }
        public function setLocation($location){
            $this->location = $location;
        }
        public function setPrice($price){
            $this->price = $price;
        }
        public function setLandlordContact($contact){
            $this->landlord_contact = $contact;
        }

        public function getId() {
            return $this->id;
        }
        public function getAdId() {
            return $this->ad_id;
        }
        public function getStdName() {
            return $this->std_name;
        }
        public function getStdContact() {
            return $this->std_contact;
        }
        public function getStatus() {
            return $this->status;
        }
        public function getLocation(){
            return $this->location;
        }
        public function getPrice(){
            return $this->price;
        }
        public function getLandlordContact(){
            return $this->landlord_contact;
        }
    }
?>