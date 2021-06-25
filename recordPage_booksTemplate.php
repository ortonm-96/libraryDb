<?php
	// Todo: this whole file is ugly, refactor it to read better
	//echo $resultsFormatted
	$id = $queryResults[0]["id"] ?: "";
	$isbn = $queryResults[0]["isbn"] ?: "";
	$name = $queryResults[0]["name"] ?: "";
	$description = $queryResults[0]["description"] ?: "";
	$loan_date = $queryResults[0]["loan_date"] ?: "";
	$due_date = $queryResults[0]["due_date"] ?: "";
	$loaned_by_user_id = $queryResults[0]["loaned_by_user_id"] ?: "";

	if (!empty($loaned_by_user_id)){
		$userInfo = getRequest_query(["table"=>"users", "user_id"=>$loaned_by_user_id]);
		$userFullName = $userInfo[0]["full_name"];
		$userRecordLink = "recordPage.php?table=users&user_id={$loaned_by_user_id}";
	} else{
		$userInfo = "";
		$userFullName = "";
		$userRecordLink = "";
	}

	if(!empty($loan_date)){
			$loanDisabled = " disabled";
			$returnDisabled = "";
			// if user isn't staff and the book is loaned by someone else, disable the return button.
			if($_SESSION['userId'] == 3 and $loaned_by_user_id != $_SESSION['userId']){
				$returnDisabled = "disabled";
			}
		} else {
			$loanDisabled = "";
			$returnDisabled = " disabled";
		}

?>
<p>Book page template test</p>
<form method="post">

	<div class="form-group d-none">
		<label for="first_name">ID</label>
		<input required type="number" name="id" id="id" class="form-control" value=<?php echo "\"{$id}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="isbn">ISBN</label>
		<input required type="number" name="isbn" id="isbn" class="form-control" value=<?php echo "\"{$isbn}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="form-control" value=<?php echo "\"{$name}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="description">Description</label>
		<input type="text" name="description" id="description" class="form-control" value=<?php echo "\"{$description}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="loan_date">Loan Date</label>
		<input type="date" name="loan_date" id="loan_date" class="form-control" value=<?php echo "\"{$loan_date}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="due_date">Due Date</label>
		<input disabled type="date" name="due_date" id="due_date" class="form-control" value=<?php echo "\"{$due_date}\""; ?>></input>
	</div>

	<div class="form-group">
		<label for="loaned_by_user_id">Loaned By</label>
		<!-- Hide the actual input, because there's no reason for the user to have access to this.-->
		<input type="hidden" name="loaned_by_user_id" id="loaned_by_user_id" class="form-control" value=<?php echo "\"{$loaned_by_user_id}\""; ?>></input>
		<!-- Generate a link to the user's record page if applicable -->
		<a href=<?php echo "{$userRecordLink}"; ?>><?php echo "{$userFullName}"; ?></a>
	</div>


	<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="updated_record.php">Update</button>
	<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="deleted_record.php">Delete</button>
	<button type="submit" role="button" class="btn btn-light" formaction="loanBook.php"<?php echo $loanDisabled; ?>>Loan book</button>
	<button type="submit" role="button" class="btn btn-light" formaction="returnBook.php"<?php echo $returnDisabled; ?>>Return book</button>
</form>
