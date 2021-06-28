<?php include "templates/sessionReqs.html";?>
<?php include "templates/permissionBuffer_head.html";?>
<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<?php
	require_once "functions/update.php";
	print_r($_FILES);

	$results = postRequest_Update_Books($_POST);
	//header("Refresh: 1.5; URL= {$_SERVER["HTTP_REFERER"]}");
?>
<div class="container float-left border rounded">
<p>
	Record updated succesfully
</p>
<!--<a href="index.php" role="button" class="btn btn-light">Back</a> Have a button here pointing to the last page, in case the redirect doesn't work? Can I access $_SERVER["HTTP_REFERER"] outside of the php tags?-->
<a href="index.php" role="button" class="btn btn-light">Home</a>
</div>
<?php include "templates/bootstrapScript.html";?>
<?php include "templates/permissionBuffer_tail.html";?>