<?php

class Userlist {

    private $activelist = array();
    private $blacklist = array();
	private $lastID = 0;

    public function __construct($n) {
        //load n user profiles
		$JSON = file_get_contents("http://api.randomuser.me?results=$n");
		$this->activelist = array_merge($this->activelist,$this->deserialize($JSON));
    }
	//username
    public function add() {
        //load 1 additional user and add it to list
		$JSON = file_get_contents("http://api.randomuser.me");
		$this->activelist = array_merge($this->activelist,$this->deserialize($JSON));
    }
	//activelist
    public function getActivelist() {
        return $this->activelist;
    }
	//blacklist
    public function getBlacklist() {
        return $this->blacklist;
    }
	//JSON serialiazed activelist
    public function getJSONActivelist() {
        return json_encode((array)$this->activelist);
    }
	//JSON serialiazed blacklist
    public function getJSONBlacklist() {
        return json_encode((array)$this->blacklist);
    }
	//add user to blacklist
    public function block($id) {
		//find user
        foreach($this->activelist as $index => $user)
			if ($user->getID() == $id) {
				//move from active to blacklist
				array_splice($this->activelist, $index, 1);
				array_push($this->blacklist, $user);
				break;
			}
		
    }
	//remove user from blacklist
    public function unblock($id) {
		//find user
        foreach($this->blacklist as $index => $user)
			if ($user->getID() == $id) {
				//move from blacklist to active
				array_splice($this->blacklist, $index, 1);
				array_push($this->activelist, $user);
				break;
			}
		
    }
	
	private function deserialize ($JSON) {
		$data = json_decode($JSON);
		$users = array();
		foreach($data->results as $json_user) {
			$user = new User(++$lastID);
			$user->setUsername($json_user->user->username);
			$user->setFirstname($json_user->user->name->first);
			$user->setLastname($json_user->user->name->last);
			$user->setEmail($json_user->user->email);
			
			array_push($users, $user);
		}
		//var_dump($users);
		return $users;
	}
	
}