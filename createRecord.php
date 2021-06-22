<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>

<?php
	require_once "functions/create.php";
	require_once "functions/displayRecord.php";
	
	$createdId = postRequest_create($_POST);

	$recordPageParams = "table=books&id={$createdId}";
	header("Refresh: 1.5; URL=recordPage.php?{$recordPageParams}");

?>
<div class="container-fluid float-left border rounded">
<p>
	Item created succesfully<br>
</p>
<a role="button" class="btn btn-light" href="index.php">Home</a>
</div>
<?php include "templates/bootstrapScript.html";?>