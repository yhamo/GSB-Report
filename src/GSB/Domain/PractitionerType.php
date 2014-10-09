<?php

namespace GSB\Domain;

class PractitionerType
{
    private $type_id;
    private $type_code;
    private $type_name;
    private $type_place;
    
    public function getType_id() {
        return $this->type_id;
    }

    public function getType_code() {
        return $this->type_code;
    }

    public function getType_name() {
        return $this->type_name;
    }

    public function getType_place() {
        return $this->type_place;
    }

    public function setType_id($type_id) {
        $this->type_id = $type_id;
    }

    public function setType_code($type_code) {
        $this->type_code = $type_code;
    }

    public function setType_name($type_name) {
        $this->type_name = $type_name;
    }

    public function setType_place($type_place) {
        $this->type_place = $type_place;
    }


    
    
    
}