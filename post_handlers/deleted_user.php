<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/sessionReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_head.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/navbar.html";?>
<?php
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/delete.php";
	$results = postRequest_Delete_fromUsers($_POST);
	header("Refresh: 1.5; URL=/libraryDb/index.php");
	//$resultsFormatted = formatRecordsAsTable($results);

?>
<div class="container float-left border rounded">
<p>
	Record deleted
</p>

<a href="/libraryDb/index.php" role="button" class="btn btn-light">Home</a>
</div>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapScript.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_tail.html";?>