<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<?php
	require_once "functions/update.php";

	$currentTimestamp = date('Y-m-d H:i:s');
	$loanDateRequestInfo = array("isbn"=>$_POST["isbn"], "loan_date"=>$currentTimestamp);

	$results = postRequest_Update_Books_setLoanDate($loanDateRequestInfo);

	header("Refresh: 1.5; URL= {$_SERVER["HTTP_REFERER"]}");
?>
<div class="container float-left border rounded">
<p>
	Book loaned succesfully
</p>

<a href="index.php" role="button" class="btn btn-light">Home</a>
</div>
<?php include "templates/bootstrapScript.html";?>