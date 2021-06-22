<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>

<?php
	require_once "functions/create.php";
	require_once "functions/displayRecord.php";

	postRequest_create($_POST);

	// Formats the post request as a table (generating feedback of the expected output)
	// Cheats a little bit - ideally I should have the feedback be the *actual* record as it is in the tables. Will add this at a later date
	$headerRow = ["isbn", "name", "description"];
	$created = formatRecordsAsTable([$_POST], $headerRow, "books", "isbn");
	/*
	$createdId = $pdo->prepare("SELECT * FROM books WHERE isbn=?")->execute($lastInserted);
	$createdFetch = $createdId->fetchAll();
	$created = formatRecordsAsTable($createdFetch);
	*/
?>
<div class="container-fluid float-left border rounded">
<p>
	Item created: <br>
	<?php echo $created ?>
</p>
<a role="button" class="btn btn-light" href="index.php">Home</a>
</div>
<?php include "templates/bootstrapScript.html";?>