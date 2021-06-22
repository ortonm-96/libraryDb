<?php

function postRequest_Update_Books($postRequest){
	require_once "functions/config.php";
	
	$sqlStatement = "UPDATE books SET name = :name, description = :description WHERE isbn = :isbn";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute([
		'isbn' => $postRequest["isbn"],
		'name' => $postRequest["name"],
		'description' => $postRequest["description"]
	]);
	
	$results = $statement->fetchAll();

	return $results;

}

function postRequest_Update_Books_setLoanDate($postRequest){
	require_once "functions/config.php";
	
	$sqlStatement = "UPDATE books SET loan_date = :loan_date, loaned_by_user_id = :loaned_by_user_id WHERE isbn = :isbn";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute([
		'loan_date' => $postRequest["loan_date"],
		'loaned_by_user_id' => $postRequest["loaned_by_user_id"],
		'isbn' => $postRequest["isbn"]
	]);
	
	$results = $statement->fetchAll();

	return $results;

}

?>