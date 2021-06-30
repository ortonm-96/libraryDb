<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/sessionReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_head.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/navbar.html";?>

<?php
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/create.php";
	
	$createdId = postRequest_create_user($_POST);

	$recordPageParams = "table=users&id={$createdId}";
	header("Refresh: 1.5; URL=/libraryDb/recordPage.php?{$recordPageParams}");

?>
<div class="container-fluid float-left border rounded">
<p>
	Item created succesfully<br>
</p>
<a role="button" class="btn btn-light" href="/libraryDb/index.php">Home</a>
</div>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapScript.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_tail.html";?>