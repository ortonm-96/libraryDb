<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search for record</title>
</head>
<body>

	<div class="float-left container border rounded">

	<p>Search for record</p>
	<a href="index.php" role="button" class="btn btn-light">Back</a>
	</div>
	<div class="float-left container border rounded">
	<form action="resultsPage.php" method="get">
		<div class="my-2">
		<label for="isbn" class="form-label">ISBN:</label>
		<input type="text" name="isbn" id="isbn" class="form-control">
		</div>

		<div class="my-2">
		<label for="name" class="form-label">Name:</label>
		<input type="text" name="name" id="name" class="form-control">
		</div>
		
		<input type="hidden" name="table" value="books">
		<input type="submit" value="Submit" class="btn btn-light">
	</form>
	</div>

</body>
<?php include "templates/bootstrapScript.html";?>
</html>