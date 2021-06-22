<?php
function getUsers(){
	require_once "functions/config.php";

	$sqlStatement = 'SELECT * FROM users';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}
?>