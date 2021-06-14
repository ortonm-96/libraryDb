<?php
require_once "config.php";
require_once "displayRecord.php";
/*
// Version using PDO prepared statements. Doesn't work - gives a syntax error for the SQL statement. I think the issue is somewhere in the way PDO is escaping the table name, but it doesn't have a way for me to view the statement before sending, so I can't look at it to see where the error is.
// Replaced with a temporary version that doesn't use PDO's param binding. It *works*, but it's now vulnerable to injection. Replace asap.

$tableName = $_GET["table"];
$prepare_vars = [$tableName];
unset($_GET["table"]);

$sqlStatement = "SELECT * FROM ? WHERE ";

foreach($_GET as $key=>$value){
	//$sqlStatement .= "? = '?'";
	$sqlStatement .= "? = ?";
	array_push($prepare_vars, $key, $value);
	// Insert an AND here as well. Not necessary on the final iteration of this loop - what's php's way of checking that?
}
$statement = $pdo->prepare($sqlStatement);
$statement->execute($prepare_vars);

}
*/

$tableName = $_GET["table"];
$prepare_vars = [$tableName];
unset($_GET["table"]);

$sqlStatement = "SELECT * FROM {$tableName} WHERE ";

foreach($_GET as $key=>$value){
	$sqlStatement .= "{$key} = '{$value}'";
	// Insert an AND here as well. Not necessary on the final iteration of this loop - what's php's way of checking that? 
}

$statement = $pdo->prepare($sqlStatement);
$statement->execute();


//$results = $statement->fetchAll();
$results = $statement->fetch();

#print_r($results);

$resultsFormatted = formatRecord($results);
echo $resultsFormatted

?>