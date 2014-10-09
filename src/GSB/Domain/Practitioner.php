<?php

namespace GSB\Domain;

class Practitioner
{
    private $id;
    private $type_id;
    private $name;
    private $first_name;
    private $address;
    private $zip_code;
    private $city;
    private $coefficient;
    
    public function getId() {
        return $this->id;
    }

    public function getType_id() {
        return $this->type_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getZip_code() {
        return $this->zip_code;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCoefficient() {
        return $this->coefficient;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setType_id($type_id) {
        $this->type_id = $type_id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setZip_code($zip_code) {
        $this->zip_code = $zip_code;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setCoefficient($coefficient) {
        $this->coefficient = $coefficient;
    }


}