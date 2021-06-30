<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/sessionReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_head.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create New User</title>
</head>
<body>
	<div class="float-left container border rounded">
	<p>Create new user</p>
	<a role="button" class="btn btn-light" href="/libraryDb/index.php">Back</a>
	</div>
	
	<div class="float-left container border rounded">
	<form action="/libraryDb/post_handlers/create_user.php" method="post">
		<div class="form-group">
		<label for="first_name" class="form-label">First Name:</label>
		<input type="text" name="first_name" id="first_name" class="form-control" required>
		</div>

		<div class="form-group">
		<label for="last_name" class="form-label">Last Name:</label>
		<input type="text" name="last_name" id="last_name" class="form-control" required>
		</div>

		<div class="form-group">
		<label for="username" class="form-label">Username:</label>
		<input type="text" name="username" id="username" class="form-control">
		</div>
		
		<div class="form-group">
		<label for="password" class="form-label">Password:</label>
		<input type="password" name="password" id="password" class="form-control">
		</div>
		
		<input type="submit" value="Submit" class="btn btn-light">
	</form>


	</div>
</body>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapScript.html";?>
</html>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_tail.html";?>