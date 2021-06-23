<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Record Page</title>
</head>
<body>
	<div class="container float-left">
		<p>Record page</p>
		<a href="index.php" role="button" class="btn btn-light">Home</a>
	</div>

	<div class="container float-left border rounded">
	<?php
		require_once "functions/displayRecord.php";
		require_once "functions/query.php";

		$queryResults = getRequest_query($_GET);
		// Record page handler - Read the table name and choose the appropriate page template.
		switch($_GET["table"]){
			case "books":
				include "recordPage_booksTemplate.php";
				break;
			case "users":
				$resultsFormatted = "";
				include "recordPage_userTemplate.php";
				break;
		}

	?>
	</div>

</body>


<?php include "templates/bootstrapScript.html";?>
</html>