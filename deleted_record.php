<?php include "templates/bootstrapReqs.html";?>
<?php
	require_once "functions/delete.php";
	require_once "functions/displayRecord.php";

	print_r($_POST);
	$results = postRequest_Delete_fromBooks($_POST);
	print_r($results);

	echo "deleted record placeholder";

	//$resultsFormatted = formatRecordsAsTable($results);

?>

<a href="index.php" role="button" class="btn btn-light">Back</a>