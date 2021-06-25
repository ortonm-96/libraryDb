<?php

function postRequest_Update_Books($postRequest){
	require "functions/config.php";

	$sqlStatement = "UPDATE books SET isbn = :isbn, name = :name, description = :description, loan_date = :loan_date, loaned_by_user_id = :loaned_by_user_id WHERE id = :id";

	// If the user is setting a loan date manually, and the book doesn't already have a Loaned By value, set the loaned by ID to 1. (Future versions will take this value from the logged in user or something)
	// Implemented the above - still in testing though
	if (!empty($postRequest["loan_date"]) and empty($postRequest["loaned_by_user_id"])){
		$postRequest["loaned_by_user_id"] = $_SESSION["userId"];
	}
	// If the request had an empty value for Loaned By, set it to Null (otherwise it'll break the Foreign Key constraints)
	if (empty($postRequest["loaned_by_user_id"])){
		$postRequest["loaned_by_user_id"] = NULL;
	}

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute([
		'id' => $postRequest["id"],
		'isbn' => $postRequest["isbn"],
		'name' => $postRequest["name"],
		'description' => $postRequest["description"],
		'loan_date' => $postRequest["loan_date"],
		'loaned_by_user_id' => $postRequest["loaned_by_user_id"],
	]);
	
	$results = $statement->fetchAll();

	return $results;

}

function postRequest_Update_Books_setLoanDate($postRequest){
	require "functions/config.php";
	
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