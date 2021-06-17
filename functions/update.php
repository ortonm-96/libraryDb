<?php

function postRequest_Update_Books($postRequest){
	require_once "functions/config.php";
	
	$sqlStatement = "UPDATE books SET name = :name, description = :description WHERE isbn = :isbn";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute([
		'isbn' => $_POST["isbn"],
		'name' => $_POST["name"],
		'description' => $_POST["description"]
	]);
	
	$results = $statement->fetchAll();

	return $results;

}


?>