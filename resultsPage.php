<?php include "templates/bootstrapReqs.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Results</title>
</head>
<body>

	<?php
		require_once "functions/displayRecord.php";
		require_once "functions/query.php";

		$queryResults = getRequest_query($_GET);
		$resultsFormatted = formatRecordsAsTable($queryResults, "books", "isbn");
		echo $resultsFormatted;
	?>

</body>
<a role="button" class="btn btn-light" href="index.php">Home</a>
</html>