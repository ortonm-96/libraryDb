<?php

function postRequest_Delete_fromBooks($postRequest){
	require "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/config.php";

	$sqlStatement = "DELETE FROM books WHERE id = :id";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute(["id" => $postRequest["id"]]);
	
	$results = $statement->fetchAll();

	return $results;

}

function postRequest_Delete_fromUsers($postRequest){
	require "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/config.php";

	$sqlStatement = "DELETE FROM users WHERE user_id = :user_id";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute(["user_id" => $postRequest["user_id"]]);
	
	$results = $statement->fetchAll();

	return $results;

}


?>