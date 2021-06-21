<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
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

		if (count($queryResults) == 1){
			$recordPageParams = "table=books&isbn={$queryResults[0]["isbn"]}";
			header("Refresh: 0.1; URL=recordPage.php?{$recordPageParams}");
		} else{
			$resultsFormatted = formatRecordsAsTable($queryResults, "books", "isbn");
			echo $resultsFormatted;
		}

		
	?>

</body>
<a role="button" class="btn btn-light" href="index.php">Home</a>
<?php include "templates/bootstrapScript.html";?>
</html>