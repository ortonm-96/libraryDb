<?php

function getRequest_query($getRequest){
	require_once "functions/config.php";
	$tableName = $getRequest["table"];
	$prepare_vars = [$tableName];
	unset($getRequest["table"]);

	$sqlStatement = "SELECT * FROM {$tableName} WHERE ";

	$queryFields = [];

	foreach($getRequest as $key=>$value){
		$statementAddition = "{$key} LIKE '%{$value}%'";
		array_push($queryFields, $statementAddition);
	}

	$sqlStatement .= implode(" AND ", $queryFields);

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();


	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

?>
