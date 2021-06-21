<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Record Page</title>
</head>
<body>

	<?php
		require_once "functions/displayRecord.php";
		require_once "functions/query.php";

		$queryResults = getRequest_query($_GET);
		$resultsFormatted = formatRecordForPage_inputs($queryResults[0]);
		echo $resultsFormatted;

	?>

</body>

<a href="index.php" role="button" class="btn btn-light">Home</a>
<?php include "templates/bootstrapScript.html";?>
</html>