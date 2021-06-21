<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<a href="createItem.php" role="button" class="btn btn-light">Create item</a>
	<br>
	<a href="search_isbn.php" role="button" class="btn btn-light">Search item</a>
	<br>
	<?php
		require_once "functions/showtable_books.php";
		require_once "functions/displayRecord.php";

		$booksTable = getBooks();
		$booksTableFormatted = formatRecordsAsTable($booksTable, "books", "isbn");
		echo $booksTableFormatted;
	?>
</body>
</html>