<?php include "templates/bootstrapReqs.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Item</title>
</head>
<body>
	<p>Create item</p>
	<a role="button" class="btn btn-light" href="index.php">Back</a>

	<!-- Todo:
		Add validation to force the ISBN to be a number
	-->
	<form action="createRecord.php" method="post">
		ISBN: <input type="text" name="isbn"><br>
		Name: <input type="text" name="name"><br>
		Description: <input type="text" name="description"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>