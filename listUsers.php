<?php include "templates/sessionReqs.html";?>
<?php include "templates/permissionBuffer_head.html";?>
<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<div class="container-fluid float-left border rounded">
	<?php
		require_once "functions/showtable_users.php";
		require_once "functions/displayRecord.php";

		$usersTable = getUsers();
		$headerRow = [
			["user_id", "ID"],
			["full_name", "Name"]
		];
		$usersTableFormatted = formatRecordsAsTable($usersTable, $headerRow, "users", "user_id");
		echo $usersTableFormatted;
	?>
	</div>
	<div class="container-fluid float-left border rounded">
		<a role="button" class="btn btn-light" href="/libraryDb/forms/create_user.php">Create New User</a>
	</div>
</body>
<?php include "templates/bootstrapScript.html";?>
</html>
<?php include "templates/permissionBuffer_tail.html";?>