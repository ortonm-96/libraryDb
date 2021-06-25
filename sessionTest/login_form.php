<?php include "../templates/permissionBuffer_head.html";?>
<?php include "../templates/bootstrapReqs.html";?>
<?php include "../templates/navbar.html";?>
<?php 

require_once "../functions/query.php";

// Placeholder - use some fields that are already present in the table while I confirm this works
$queryParams = [
	"table" => "users",
	"username" => $_POST["username"] ?: "",
	"user_id" => $_POST["password"] ?: ""
];

$queryResults = getRequest_query($queryParams);

if (count($queryResults) == 1){
	session_start();
	$_SESSION['userId'] = $queryResults[0]["user_id"];
	header("Refresh: 1.5; URL=../index.php");
	echo "<p>Logged in successfully</p>";	
} else {
	 header("Refresh: 1.5; URL=/libraryDb/sessionTest/sessionTest_login_prompt.php");
	 echo "<p>Login failed</p>";	
}

?>
<?php include "../templates/bootstrapScript.html";?>
<?php include "../templates/permissionBuffer_tail.html";?>