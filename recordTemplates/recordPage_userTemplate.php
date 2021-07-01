<?php
require_once "{$_SERVER["DOCUMENT_ROOT"]}/libraryDb/functions/showtable_books.php";

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
<p class="pl-1">User page - <?php echo $full_name; ?></p>
<form class="border mb-2 p-1" method="post">

	<div permissionLevel="1" class="input-group d-none">
		<span class="input-group-text">ID</span>
		<input required type="number" name="user_id" id="user_id" class="form-control" value=<?php echo "\"{$user_id}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text" for="first_name">First Name</span>
		<input type="text" name="first_name" id="first_name" class="form-control" value=<?php echo "\"{$first_name}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text" for="last_name">Last Name</span>
		<input type="text" name="last_name" id="last_name" class="form-control" value=<?php echo "\"{$last_name}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text" for="username">Username</span>
		<input type="text" name="username" id="username" class="form-control" value=<?php echo "\"{$username}\""; ?>></input>
	</div>

	<div class="input-group mb-3" permissionLevel="1">
		<span class="input-group-text" for="permission_level">User role - <?php echo $permission_level_names[$user_permission_level]; ?></span>
		<select class="form-select" name="permission_level" id="permission_level">
			<option selected value="0">Change user role</option>
			<option value="1">Staff</option>
			<option value="3">User</option>
		</select>
	</div>
	<div class="input-group mb-3" permissionLevel="1">
		<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/updated_user.php">Update</button>
		<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/deleted_user.php">Delete</button>
	</div>

</form>

<form class="border mb-2 p-1" method="post" permissionLevel="1">
	<div class="input-group d-none">
		<span class="input-group-text">ID</span>
		<input required type="number" name="user_id" id="user_id" class="form-control" value=<?php echo "\"{$user_id}\""; ?>></input>
	</div>

	<div class="input-group">
		<span class="input-group-text">New password</span>
		<input required type="password" name="new_password" id="new_password">
		<button role="button" class="btn btn-danger" type="submit" formaction="/libraryDb/post_handlers/change_user_password.php">Change password</button>
	</div>
	
</form>


<!-- Display books on loan - construct a query similar to , then pass to table render function -->
<div class="border mb-2 p-1">
	<p class="pl-1">Books on loan</p>
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
</div>