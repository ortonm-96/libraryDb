<?php include "templates/bootstrapReqs.html";?>
<?php
	require_once "functions/update.php";
	require_once "functions/displayRecord.php";

	print_r($_POST);
	$results = postRequest_Update_Books($_POST);
	print_r($results);

	echo "updated record placeholder";

	//$resultsFormatted = formatRecordsAsTable($results);

?>

<a href="index.php" role="button" class="btn btn-light">Back</a>