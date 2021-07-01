<?php
require_once "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/showtable_books.php";

//echo $resultsFormatted
$user_id = $queryResults[0]["user_id"] ?: "";
$first_name = $queryResults[0]["first_name"] ?: "";
$last_name = $queryResults[0]["last_name"] ?: "";
$username = $queryResults[0]["username"] ?: "";
$full_name = $queryResults[0]["full_name"] ?: "";
$user_permission_level = $queryResults[0]["permission_level"] ?: "";

$permission_level_names = [
	"1" => "Staff",
	"3" => "User"
];

?>
<p>User page - <?php echo $full_name; ?></p>
<form method="post">

	<div permissionLevel="1" class="form-group d-none">
		<label for="user_id">ID</label>
		<input required type="number" name="user_id" id="user_id" class="form-control" value=<?php echo "\"{$user_id}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="first_name">First Name</label>
		<input type="text" name="first_name" id="first_name" class="form-control" value=<?php echo "\"{$first_name}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" name="last_name" id="last_name" class="form-control" value=<?php echo "\"{$last_name}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" class="form-control" value=<?php echo "\"{$username}\""; ?>></input>
	</div>

	<div class="form-group" permissionLevel="1">
		<label for="permission_level">Current role - <?php echo $permission_level_names[$user_permission_level]; ?></label>
		<select class="form-select" name="permission_level" id="permission_level">
			<option selected value="0">Set user role</option>
			<option value="1">Staff</option>
			<option value="3">User</option>
		</select>
	</div>

	<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/updated_user.php">Update</button>
	<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/deleted_user.php">Delete</button>

</form>

<form method="post" permissionLevel="1">
	<div class="form-group d-none">
		<label for="user_id">ID</label>
		<input required type="number" name="user_id" id="user_id" class="form-control" value=<?php echo "\"{$user_id}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="new_password">New password</label>
		<input type="password" name="new_password" id="new_password">
	</div>

	<button role="button" class="btn btn-danger" type="submit" formaction="/libraryDb/post_handlers/change_user_password.php">Change password</button>
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
