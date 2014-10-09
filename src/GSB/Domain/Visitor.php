<?php

namespace GSB\Domain;

use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface
{
    
    
    // Property Private of visitor
    private $id;
    private $last_name;
    private $first_name;
    private $address;
    private $zip_code;
    private $city;
    private $hiring_date;
    private $username;
    private $password;
    private $salt;
    private $role;
    private $type;
    
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }
    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function getLast_name() {
        return $this->last_name;
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

    public function getHiring_date() {
        return $this->hiring_date;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getRole() {
        return $this->role;
    }

    public function getType() {
        return $this->type;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLast_name($last_name) {
        $this->last_name = $last_name;
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

    public function setHiring_date($hiring_date) {
        $this->hiring_date = $hiring_date;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setType($type) {
        $this->type = $type;
    }


}