<?php
	include_once 'config/database.php';
    include_once 'objects/user.php';

	$database = new Database();
    $db = $database->getConnection();

	if(!empty($_GET["email"])) {
	$query = "UPDATE users set status_ind = 'A', registered = 'Y' WHERE email='" . $_GET["email"]. "'";
    //$stmt->bindParam(':email', $this->email);
    $stmt = $db->prepare($query);
    $result = $stmt->execute(array($_GET["email"]));
		if(!empty($result)) {
			$message = "Your account is activated.";
		} else {
			$message = "Problem in account activation.";
		}
	}
?>