<?php

function postRequest_create($postRequest){
	require "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/config.php";
	$sqlInsertStatement = 'INSERT INTO `books` (`isbn`, `name`, `description`) VALUES (:isbn, :name, :description)';

	$statement = $pdo->prepare($sqlInsertStatement);
	$statement->execute([
		'isbn' => $postRequest["isbn"],
		'name' => $postRequest["name"],
		'description' => $postRequest["description"]
	]);

	return $pdo->lastInsertId();

	// I want some feedback to see the created record, but I can't just call fetch/fetchAll like I can with the other functions.
	// For now I'm using the post request to display the expected item, but I want to have this return what was actually created at some point
	// Will need to give this a return value - probably by sending a second request to retrieve the item

}

function postRequest_create_user($postRequest){
	require "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/config.php";
	
	$sqlInsertStatement = 'INSERT INTO `users` (`first_name`, `last_name`, `username`, `password`) VALUES (:first_name, :last_name, :username, :password)';

	$password_hashed = password_hash($postRequest["password"], PASSWORD_DEFAULT);

	$statement = $pdo->prepare($sqlInsertStatement);
	$statement->execute([
		'first_name' => $postRequest["first_name"],
		'last_name' => $postRequest["last_name"],
		'username' => $postRequest["username"],
		'password' => $password_hashed
	]);

	//return $pdo->lastInsertId();

}

?>
