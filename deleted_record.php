<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<?php
	require_once "functions/delete.php";
	$results = postRequest_Delete_fromBooks($_POST);
	
	header("Refresh: 1.5; URL=index.php");
	//$resultsFormatted = formatRecordsAsTable($results);

?>
<p>
	Record deleted
</p>

<a href="index.php" role="button" class="btn btn-light">Home</a>