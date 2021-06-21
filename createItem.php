<?php include "templates/bootstrapReqs.html";?>
<?php include "templates/navbar.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Item</title>
</head>
<body>
	<div class="float-left container border rounded">
	<p>Create item</p>
	<a role="button" class="btn btn-light" href="index.php">Back</a>
	</div>
	
	<div class="float-left container border rounded">
	<!-- Todo:
		Add validation to force the ISBN to be a number
	-->
	<form action="createRecord.php" method="post">
		ISBN: <input type="text" name="isbn"><br>
		Name: <input type="text" name="name"><br>
		Description: <input type="text" name="description"><br>
		<input type="submit" value="Submit" class="btn btn-light">
	</form>
	</div>
</body>
<?php include "templates/bootstrapScript.html";?>
</html>