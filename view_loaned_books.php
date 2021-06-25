<?php include "templates/sessionReqs.html";?>
<?php include "templates/permissionBuffer_head.html";?>
<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Loaned books</title>
</head>
<body>
	<div class="container-fluid float-left border rounded">
	<?php
		require_once "functions/showtable_books.php";
		require_once "functions/displayRecord.php";

		$booksTable = getBooks_loaned();
		$headerRow = [
			["isbn", "ISBN"],
			["name", "Name"],
			["description", "Description"],
			["full_name", "Loaned by"],
			["due_date", "Due by"]
		];
		$booksTableFormatted = formatRecordsAsTable($booksTable, $headerRow, "books", "id");
		echo $booksTableFormatted;
	?>
	</div>
</body>
<?php include "templates/bootstrapScript.html";?>
</html>
<?php include "templates/permissionBuffer_tail.html";?>