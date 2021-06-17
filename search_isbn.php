<?php include "templates/bootstrapReqs.html";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search for record</title>
</head>
<body>
	<p>Search by ISBN</p>
	<a href="index.php" role="button" class="btn btn-light">Back</a>

	<form action="resultsPage.php" method="get">
		ISBN: <input type="text" name="isbn"><br>
		<input type="hidden" name="table" value="books">
		<input type="submit" value="Submit">
	</form>
</body>
</html>