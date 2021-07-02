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

	$sqlStatement = "DELETE FROM users WHERE id = :id";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute(["id" => $postRequest["id"]]);
	
	$results = $statement->fetchAll();

	return $results;

}


?>