<?php

function getBooks(){
	require_once "functions/config.php";

	$sqlStatement = 'SELECT * FROM books';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}

function getBooks_loaned(){
	require_once "functions/config.php";

	$sqlStatement = 'SELECT * FROM books WHERE loan_date IS NOT NULL';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}

?>