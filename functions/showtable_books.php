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

	$sqlStatement = 'SELECT * FROM books INNER JOIN users ON books.loaned_by_user_id = users.user_id WHERE loan_date IS NOT NULL';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}

function getBooks_overdue(){
	require_once "functions/config.php";
	$currentTimestamp = date('Y-m-d H:i:s');
	$sqlStatement = 'SELECT * FROM books INNER JOIN users ON books.loaned_by_user_id = users.user_id WHERE due_date < "'.$currentTimestamp.'"';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}

?>