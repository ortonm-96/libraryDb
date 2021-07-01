<?php include "../templates/permissionBuffer_head.html";?>
<?php include "../templates/bootstrapReqs.html";?>
<?php include "../templates/navbar.html";?>
<?php 

require_once "../functions/query.php";

// Todo: Store hashed passwords instead of plaintext ones.
// Leaving this one for now to work on other things - I can feel myself flagging a little.
//$pw = $_POST["password"] ?: "";
//$pwHashed = password_hash($pw, PASSWORD_DEFAULT);
//echo $pwHashed;

// Placeholder - use some fields that are already present in the table while I confirm this works
$queryParams = [
	"table" => "users",
	"username" => $_POST["username"] ?: "",
	"password" => $_POST["password"] ?: ""
];

$queryResults = getRequest_query($queryParams);

if (count($queryResults) == 1){
	session_start();
	$_SESSION['userId'] = $queryResults[0]["user_id"];
	$_SESSION['userPermissionLevel'] = $queryResults[0]["permission_level"];
	header("Refresh: 1.5; URL=../index.php");
	echo "<p>Logged in successfully</p>";	
} else {
	 header("Refresh: 1.5; URL=/libraryDb/sessionTest/sessionTest_login_prompt.php");
	 echo "<p>Login failed</p>";	
}

?>
<?php include "../templates/bootstrapScript.html";?>
<?php include "../templates/permissionBuffer_tail.html";?>