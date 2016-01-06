<?php

class User  implements JsonSerializable {

    private $id;
    private $username;
	private $firstname;
	private $lastname;
	private $email;
	
	public function JsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function __construct($id) {
        $this->id = $id;
    }
	//id
    public function getID() {
        return $this->id;
    }
	//username
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }
	//firstname
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
	//lastname
    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
	//email
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}