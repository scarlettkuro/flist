<?php
class UserAPIController {
	

	 static function users() {
		$userlist = $_SESSION['userlist'];
		return $userlist->getJSONActivelist();
	}
	
	static function blacklist() {
		$userlist = $_SESSION['userlist'];
		return $userlist->getJSONBlacklist();
	}
	
	static function add() {
		$userlist = $_SESSION['userlist'];
		return $userlist->add();
	}
	
	static function block($id) {
		$userlist = $_SESSION['userlist'];
		return $userlist->block($id);
	}
	
	static function unblock($id) {
		$userlist = $_SESSION['userlist'];
		return $userlist->unblock($id);
	}

}

?>
