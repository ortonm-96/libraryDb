<?php
function getUsers(){
	require "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/config.php";

	$sqlStatement = 'SELECT * FROM users';

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();
	$tableOutput = $statement->fetchAll();

	return $tableOutput;
}
?>