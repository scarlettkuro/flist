<?php
class MainController {
	 static function index() {
		$_SESSION['userlist'] = new Userlist(10);
		return html('index.htm'); 
	}

}

?>
