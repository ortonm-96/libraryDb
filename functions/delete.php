<?php

function postRequest_Delete_fromBooks($postRequest){
	require "functions/config.php";

	$sqlStatement = "DELETE FROM books WHERE id = :id";

	$statement = $pdo->prepare($sqlStatement);

	$statement->execute(["id" => $postRequest["id"]]);
	
	$results = $statement->fetchAll();

	return $results;

}


?>