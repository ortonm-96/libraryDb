<?php
require_once "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/showtable_books.php";

//echo $resultsFormatted
$user_id = $queryResults[0]["user_id"] ?: "";
$first_name = $queryResults[0]["first_name"] ?: "";
$last_name = $queryResults[0]["last_name"] ?: "";
$full_name = $queryResults[0]["full_name"] ?: "";
?>
<p>User page - <?php echo $full_name; ?></p>
<form>

	<div class="form-group">
		<label for="first_name">First Name</label>
		<input type="text" name="first_name" id="first_name" class="form-control" value=<?php echo "\"{$first_name}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" name="last_name" id="last_name" class="form-control" value=<?php echo "\"{$last_name}\""; ?>></input>
	</div>

</form>

<!-- Display books on loan - construct a query similar to , then pass to table render function -->
<p>Books on loan</p>
<?php
	$userBooksOnLoan = getBooks_loaned_byUser($user_id);
	$headerRow = [
			["isbn", "ISBN"],
			["name", "Name"],
			["description", "Description"],
			["full_name", "Loaned by"],
			["due_date", "Due by"]
		];
	$userBooksOnLoanTableFormatted = formatRecordsAsTable($userBooksOnLoan, $headerRow, "books", "id");
	echo $userBooksOnLoanTableFormatted
?>
