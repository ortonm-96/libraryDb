<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<?php
		require_once "functions/showtable_books.php";
		require_once "functions/displayRecord.php";

		$booksTable = getBooks();
		$booksTableFormatted = formatRecordsAsTable($booksTable, "books", "isbn");
		echo $booksTableFormatted;
	?>
</body>
<?php include "templates/bootstrapScript.html";?>
</html>