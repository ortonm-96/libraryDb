<?php

function postRequest_Delete_fromBooks($postRequest){
	require_once "functions/config.php";

	$sqlStatement = "DELETE FROM books WHERE isbn = :isbn";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute(["isbn" => $postRequest["isbn"]]);
	
	$results = $statement->fetchAll();

	return $results;

}


?>