<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/sessionReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_head.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapReqs.html";?>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Item</title>
</head>
<body>
	<div class="float-left container border rounded">
	<p>Create item</p>
	<a role="button" class="btn btn-light" href="/libraryDb/index.php">Back</a>
	</div>
	
	<div class="float-left container border rounded">
	<form action="/libraryDb/createRecord.php" method="post">
		<div class="my-2">
		<label for="isbn" class="form-label">ISBN:</label>
		<input type="number" name="isbn" id="isbn" class="form-control" required>
		</div>

		<div class="my-2">
		<label for="name" class="form-label">Name:</label>
		<input type="text" name="name" id="name" class="form-control" required>
		</div>

		<div class="my-2">
		<label for="description" class="form-label">Description:</label>
		<input type="text" name="description" id="description" class="form-control">
		</div>	
		
		
		<input type="submit" value="Submit" class="btn btn-light">
	</form>


	</div>
</body>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/bootstrapScript.html";?>
</html>
<?php include "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/templates/permissionBuffer_tail.html";?>