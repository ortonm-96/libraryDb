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
	$cover_image_filepath = $queryResults[0]["cover_image_filepath"] ?: "";

	if (!empty($loaned_by_user_id)){
		$userInfo = getRequest_query(["table"=>"users", "user_id"=>$loaned_by_user_id]);
		$userFullName = $userInfo[0]["full_name"];
		$userRecordLink = "/libraryDb/recordPage.php?table=users&user_id={$loaned_by_user_id}";
	} else{
		$userInfo = "";
		$userFullName = "";
		$userRecordLink = "";
	}

	if(!empty($loan_date)){
			$loanDisabled = " disabled";
			$returnDisabled = "";
			// if user isn't staff and the book is loaned by someone else, disable the return button.
			if($_SESSION['userPermissionLevel'] == 3 and $loaned_by_user_id != $_SESSION['userId']){
				$returnDisabled = "disabled";
			}
		} else {
			$loanDisabled = "";
			$returnDisabled = " disabled";
		}

?>
<p class="pl-1">Book information:</p>
<img src=<?php echo "\"{$cover_image_filepath}\""; ?>>
<form class="border mb-2 p-1" method="post" enctype="multipart/form-data">

	<div class="input-group d-none">
		<span class="input-group-text">ID</span>
		<input required type="number" name="id" id="id" class="form-control" value=<?php echo "\"{$id}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">ISBN</span>
		<input required type="number" name="isbn" id="isbn" class="form-control" value=<?php echo "\"{$isbn}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Name</span>
		<input type="text" name="name" id="name" class="form-control" value=<?php echo "\"{$name}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Description</span>
		<input type="text" name="description" id="description" class="form-control" value=<?php echo "\"{$description}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Loan Date</span>
		<input type="date" name="loan_date" id="loan_date" class="form-control" value=<?php echo "\"{$loan_date}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Due Date</span>
		<input disabled type="date" name="due_date" id="due_date" class="form-control" value=<?php echo "\"{$due_date}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Upload new cover image</span>
		<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
	</div>

	<div class="input-group mb-3">
		<span class="input-group-text">Loaned By</span>
		<!-- Hide the actual input, because there's no reason for the user to have access to this.-->
		<input type="hidden" name="loaned_by_user_id" id="loaned_by_user_id" class="form-control" value=<?php echo "\"{$loaned_by_user_id}\""; ?>></input>
		<!-- Generate a link to the user's record page if applicable -->
		<!--<span class="input-group-text"><a href=<?php echo "{$userRecordLink}"; ?>><?php echo "{$userFullName}"; ?></a></span>-->
		<a class="btn btn-light btn-outline-info" href=<?php echo "{$userRecordLink}"; ?>><?php echo "{$userFullName}"; ?></a>
	</div>

	<div class="input-group d-none">
		<span class="input-group-text">cover_image_filepath</span>
		<input type="text" name="cover_image_filepath" id="cover_image_filepath" class="form-control" value=<?php echo "\"{$cover_image_filepath}\""; ?>></input>
	</div>

	<div class="input-group mb-3">
		<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/updated_record.php">Update</button>
		<button permissionLevel="1" type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/deleted_record.php">Delete</button>
		<button type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/loanBook.php"<?php echo $loanDisabled; ?>>Loan book</button>
		<button type="submit" role="button" class="btn btn-light" formaction="/libraryDb/post_handlers/returnBook.php"<?php echo $returnDisabled; ?>>Return book</button>
	</div>

</form>
