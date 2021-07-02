<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/sessionReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_head.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/navbar.html";?>

<?php
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/create.php";
	
	$createdId = postRequest_create_user($_POST);

	$recordPageParams = "table=users&id={$createdId}";
	// Returning lastCreatedId doesn't work (because I goofed and didn't name the primary key for users id)
	// So trying to do anything wiht $createdId will cause errors. Until I fix it, redirect to index instead of the created user's page.
	header("Refresh: 1.5; URL=/libraryDb/recordPage.php?{$recordPageParams}");
	//header("Refresh: 1.5; URL=/libraryDb/index.php");

?>
<div class="container-fluid float-left border rounded">
<p>
	Item created succesfully<br>
</p>
<a role="button" class="btn btn-light" href="/libraryDb/index.php">Home</a>
</div>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapScript.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_tail.html";?>