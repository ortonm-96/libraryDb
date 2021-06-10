<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>hello world</title>
</head>
<body>
	<p>Create item</p>
	<a href="index.php">Back</a>

	<!-- Todo:
		Find out how to restrict the form so that only numbers can be inserted into the isbn
			Or possibly do some sort of formatting on it to allow the user to input it w/ the dashes and then strip them out after?
	-->
	<form action="createRecord.php" method="post">
		ISBN: <input type="text" name="isbn"><br>
		Name: <input type="text" name="name"><br>
		Description: <input type="text" name="description"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>