<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Results</title>
</head>
<body>

<div class="container float-left border rounded">
	<p>Search results</p>
	<a role="button" class="btn btn-light" href="index.php">Home</a>
</div>

<div class="container-fluid float-left border rounded">
	<?php
		require_once "functions/displayRecord.php";
		require_once "functions/query.php";

		$queryResults = getRequest_query($_GET);

		if (count($queryResults) == 1){
			$recordPageParams = "table=books&id={$queryResults[0]["id"]}";
			header("Refresh: 0.1; URL=recordPage.php?{$recordPageParams}");
		} else{
			$headerRow = [
				["isbn", "ISBN"],
				["name", "Name"],
				["description", "Description"]
			];
			$resultsFormatted = formatRecordsAsTable($queryResults, $headerRow, "books", "id");
			echo $resultsFormatted;
		}

		
	?>
</div>
</body>

<?php include "templates/bootstrapScript.html";?>
</html>