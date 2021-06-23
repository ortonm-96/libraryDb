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
		// Old version - Always rendered the query results using the basic template
		//$resultsFormatted = formatRecordForPage_inputs($queryResults[0]);
		
		// New version - by using a switch case based on the table name, I can choose which template to generate the page from.
		switch($_GET["table"]){
			case "books":
				//$resultsFormatted = formatRecordForPage_inputs($queryResults[0]);
				//echo $resultsFormatted;
				include "recordPage_booksTemplate.php";
				break;
			case "users":
				//$resultsFormatted = formatRecordForPage_inputs($queryResults[0]);
				$resultsFormatted = "";
				// Using include here lets me slot in page elements in a more streamlined way than passing it to a seperate function, returning it, then echoing the result.
				// Those will have access to any variables I set here, so I don't need to pass things back and forth (which seems worse to me? I might run into issues with some things not having values, or scope problems if I'm not careful.)
				include "recordPage_userTemplate.php";
				break;
		}

		//echo $resultsFormatted;
	?>
	</div>

</body>


<?php include "templates/bootstrapScript.html";?>
</html>