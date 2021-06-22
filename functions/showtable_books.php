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

function getBooks_overdue(){
	require_once "functions/config.php";
	$currentTimestamp = date('Y-m-d H:i:s');
	// Need to compare currentTimestamp to due_date. What's SQL's syntax for that?

	$sqlStatement = 'SELECT * FROM books WHERE due_date < "'.$currentTimestamp.'"';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}

?>