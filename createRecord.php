<?php
	require_once "config.php";
	require_once "displayRecord.php";

	$sqlInsertStatement = 'INSERT INTO `books` (`isbn`, `name`, `description`) VALUES (:isbn, :name, :description)';


	$statement = $pdo->prepare($sqlInsertStatement);
	$statement->execute([
		'isbn' => $_POST["isbn"],
		'name' => $_POST["name"],
		'description' => $_POST["description"]
	]);

	$results = $statement->fetch();

	// Todo: Make a function to format this properly. Predict I'll get a lot of use out of that one. Just a dump is fine for the time being tho
	$created = 'ISBN: ' . $_POST["isbn"] . 'Name: ' . $_POST["name"] . 'Description: ' . $_POST["description"]

	//$created = formatRecord($results);
	//$created = "";

?>

<p>
	Item created: <br>
	<?php echo $created ?>
</p>
<a href="index.php">Home</a>
