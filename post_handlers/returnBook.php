<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/sessionReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_head.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/navbar.html";?>
<?php
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/update.php";

	$currentTimestamp = null;
	$loanDateRequestInfo = array("id"=>$_POST["id"], "loan_date"=>$currentTimestamp, "loaned_by_user_id"=>Null);

	$results = postRequest_Update_Books_setLoanDate($loanDateRequestInfo);

	header("Refresh: 1.5; URL= {$_SERVER["HTTP_REFERER"]}");
?>
<div class="container float-left border rounded">
<p>
	Book returned succesfully
</p>

<a href="/libraryDb/index.php" role="button" class="btn btn-light">Home</a>
</div>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapScript.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_tail.html";?>