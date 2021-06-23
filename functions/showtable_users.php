<?php
function getUsers(){
	require "functions/config.php";

	$sqlStatement = 'SELECT * FROM users';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}
?>