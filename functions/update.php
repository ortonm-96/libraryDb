<?php

function postRequest_Update_Books($postRequest){
	require_once "functions/config.php";
	
	$sqlStatement = "UPDATE books SET isbn = :isbn, name = :name, description = :description WHERE id = :id";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute([
		'id' => $postRequest["id"],
		'isbn' => $postRequest["isbn"],
		'name' => $postRequest["name"],
		'description' => $postRequest["description"]
	]);
	
	$results = $statement->fetchAll();

	return $results;

}

function postRequest_Update_Books_setLoanDate($postRequest){
	require_once "functions/config.php";
	
	$sqlStatement = "UPDATE books SET loan_date = :loan_date, loaned_by_user_id = :loaned_by_user_id WHERE id = :id";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute([
		'loan_date' => $postRequest["loan_date"],
		'loaned_by_user_id' => $postRequest["loaned_by_user_id"],
		'id' => $postRequest["id"]
	]);
	
	$results = $statement->fetchAll();

	return $results;

}

?>