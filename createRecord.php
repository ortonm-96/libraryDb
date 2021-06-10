<?php
	require_once "config.php";

	$sqlInsertStatement = 'INSERT INTO `books` (`isbn`, `name`, `description`) VALUES (:isbn, :name, :description)';


	$statement = $pdo->prepare($sqlInsertStatement);
	$statement->execute([
		'isbn' => $_POST["isbn"],
		'name' => $_POST["name"],
		'description' => $_POST["description"]
	]);

	// Should I output the returned record?
	// Feels like I ought to have some feedback here at the very least.
	// Bare minimum a home button, some sort of "success" display, and something showing the created record
	// Does statement->execute return the new row? I think it does. no it doesn't lol
	// So i could pass that to another function to format it - that'll be a pretty handy thing to have in general

	$created = $pdo->lastInsertId();
	echo $created;



?>
Item created <br>

<a href="index.php">Home</a>
