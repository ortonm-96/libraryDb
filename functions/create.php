<?php

function postRequest_create($postRequest){
	require "functions/config.php";
	$sqlInsertStatement = 'INSERT INTO `books` (`isbn`, `name`, `description`) VALUES (:isbn, :name, :description)';

	$statement = $pdo->prepare($sqlInsertStatement);
	$statement->execute([
		'isbn' => $_POST["isbn"],
		'name' => $_POST["name"],
		'description' => $_POST["description"]
	]);

	return $pdo->lastInsertId();

	// I want some feedback to see the created record, but I can't just call fetch/fetchAll like I can with the other functions.
	// For now I'm using the post request to display the expected item, but I want to have this return what was actually created at some point
	// Will need to give this a return value - probably by sending a second request to retrieve the item

}

?>
