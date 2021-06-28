<?php

function postRequest_Update_Books($postRequest){
	require "functions/config.php";

	$sqlStatement = "UPDATE books SET isbn = :isbn, name = :name, description = :description, loan_date = :loan_date, loaned_by_user_id = :loaned_by_user_id, cover_image_filepath = :coverImageFilepath WHERE id = :id";

	// 
	// If a file is present, attempt to upload it, and if successful set the cover_filepath to the uploaded path.
	if (isset($_FILES)){
		require "uploadImage.php";
		$uploadedFile = uploadImage($_FILES);
		// uploadImage returns the filepath if successful, False if not
		if ($uploadedFile){
			//echo $uploadedFile;
			// Need to find an equivalent to realpath that converts to a url. (issue with realpath is windows paths use backslashes. I could just do a str replace, but is that the best option?)
			// However I end up dealing with the above, I should also pass it through urlencode()
			//$coverImageFilepath = str_replace("\\", "/", realpath($uploadedFile));
			$coverImageFilepath = str_replace("\\", "/", $uploadedFile);
			// If successful, set cover_image_filepath to the return value
		}
	}

	// If a cover image path wasn't set (either because there was nothing to upload or there was, but the upload failed), set the cover image filepath to its existing value.
	if (!isset($coverImageFilepath)){
		$coverImageFilepath = $postRequest["cover_image_filepath"];
	}
	//

	// If the user is setting a loan date manually, and the book doesn't already have a Loaned By value, set the loaned by ID to the current user ID.
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
		'coverImageFilepath' => $coverImageFilepath,
	]);
	
	$results = $statement->fetchAll();

	return $results;

}

function postRequest_Update_Books_setLoanDate($postRequest){
	// Called when the user clicks the "loan book" button.
	// Updates the record to loan to the current user at the current date.
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