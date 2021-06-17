<?php

function getRequest_query($getRequest){
	require_once "functions/config.php";
	$tableName = $getRequest["table"];
	$prepare_vars = [$tableName];
	unset($getRequest["table"]);

	$sqlStatement = "SELECT * FROM {$tableName} WHERE ";

	foreach($getRequest as $key=>$value){
		$sqlStatement .= "{$key} = '{$value}'";
		// Insert an AND here as well. Not necessary on the final iteration of this loop - what's php's way of checking that?
		// Python's -1 notation probably won't work here. Something involving getRequest.length()?
	}

	$statement = $pdo->prepare($sqlStatement);
	$statement->execute();


	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

?>
