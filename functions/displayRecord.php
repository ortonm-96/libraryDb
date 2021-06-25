
<?php

/*
	Functions for reformatting the output of PDO::fetch and ::fetchAll into HTML content.
*/

/*
 Description: formats records as table
 precondition: output from a PDO fetchall
 postcondition: html formatted records
*/
function formatRecordsAsTable($records, $headerRow, $tableName="", $primaryKey=""){
	// Format the records returned by fetchAll() as a table.
	// Generate a header row, then generate a row for the item. Finally, wrap it all in table tags

	// If a table name and primary key are declared, also generate links to the record's individual page.
	// But can also be used without that, if necessary

	$headerHtml = "";

	foreach ($headerRow as $header){
		$headerHtml .= wrapStringInHtmlTag($header[1], "th");
	}

	$tableHtml = wrapStringInHtmlTag($headerHtml, "tr");

	foreach ($records as $record) {
		$rowHtml = "";
		foreach ($headerRow as $i => $header) {
			$cellContent = $record[$header[0]] ?: "";
			// In the first cell of each row, add a link to the individual item page
			if ($i == 0){
				// Only run if the required info was given in the arguments
				if(!(empty($tableName) or empty($primaryKey))){
					$recordId = $record[$primaryKey] ?: "";
					$recordPageParams = "table={$tableName}&{$primaryKey}={$recordId}";
					$cellContent = wrapStringInHtmlTag($cellContent, "a", "href=\"/librarydb/recordPage.php?{$recordPageParams}\"");
				}
			}
			$rowHtml .= wrapStringInHtmlTag($cellContent, "td");
		}
		$tableHtml .= wrapStringInHtmlTag($rowHtml, "tr");
	}

	$output = wrapStringInHtmlTag($tableHtml, "table", "class=\"table\"");

	return $output;
}
/**
 * How is it used?
*/
function wrapStringInHtmlTag($strToWrap, $tag, $tagAttributes=""){
	return "<{$tag} ${tagAttributes}>{$strToWrap}</{$tag}>";
}


function formatRecordForPage_basic($record){
	// Generates a simple page that outputs all the record's keys and values. Useful for test stuff
	// Generates HTML from a single record (recieved from pdo fetch()) to a display on a page
	$pageHtml = "";

	foreach ($record as $key => $value) {
		// do stuff to generate the page html
		// placeholder. Replace with something nice-looking later
		$pageHtml .= wrapStringInHtmlTag($key.": ".$value, "p");
	}
	return $pageHtml;

}

function formatRecordForPage_inputs($record){
	// Generates a page for a record, where each value is a form field. Also generates update and delete buttons
	// Generates HTML from a single record (recieved from pdo fetch()) to a display on a page
	$pageHtml = "";

	foreach ($record as $key => $value) {
		// Generate a <label> and an <input> tag with the relevant info from the record.
		// Then wrap them both in a form-group div and add to the generated HTML.
		$recordFormRow = wrapStringInHtmlTag($key, "label", "for={$key}");
		$recordFormRow .= wrapStringInHtmlTag("", "input", "type=text name={$key} value=\"{$value}\" id={$key} class=\"form-control\"");
		$pageHtml .= wrapStringInHtmlTag($recordFormRow, "div", "class=\"form-group\"");
	}

	// Wrap everything in <form> tags
	$pageHtml = wrapStringInHtmlTag($pageHtml, "form", "method=\"post\"");

	return $pageHtml;

}

function generateNavbarItems(){
	// Redundant since I added the output buffer trick. Will be removed soon.
	// Iterate through a list of possible navbar items
	// For each one, check the permissions required to display it against the permissions of the current user.
	// Add each item that passed to the HTML string to be returned

	$generatedHtmlContent = "";

	// Get the user's type/role from the session variables (or possibly by checking their permissions in the users table).
	// I haven't decided what form I'm going to store these in yet in the SQL, so for the time being I'm just going to check against the user's ID
	// (Which works just fine in the short-term, since I only have 2 test accounts: #1 - Molly Orton (Staff) and #2 - Joe Bloggs (User))
	// Make sure the session variable actually exists before I use it. If not (because the user isn't logged in) there won't be any point generating a navbar anyway, so just return early
	if (isset($_SESSION["userId"])){
		$userType = $_SESSION["userId"];
	} else{
		return $generatedHtmlContent;
	}

	$navbar_buttons = [
		[
			"text" => "Create item",
			"href" => "/libraryDb/createItem.php",
			"visibleToRoles" => [1]
		],
		[
			"text" => "Advanced search",
			"href" => "/libraryDb/search_isbn.php",
			"visibleToRoles" => [1, 3]
		],
		[
			"text" => "View books on loan",
			"href" => "/libraryDb/view_loaned_books.php",
			"visibleToRoles" => [1]
		],
		[
			"text" => "View overdue books",
			"href" => "/libraryDb/view_overdue_books.php",
			"visibleToRoles" => [1]
		],
		[
			"text" => "My books on loan",
			"href" => "/libraryDb/view_loaned_books_currentUser.php",
			"visibleToRoles" => [3]
		],
		[
			"text" => "My overdue books",
			"href" => "/libraryDb/view_overdue_books_currentUser.php",
			"visibleToRoles" => [3]
		],
		[
			"text" => "List users",
			"href" => "/libraryDb/listUsers.php",
			"visibleToRoles" => [1]
		]
	];

	foreach ($navbar_buttons as $navbar_item) {
		if (in_array($userType, $navbar_item["visibleToRoles"])){
			$navItemAttrs = "class=\"nav-link btn btn-light\" href=\"{$navbar_item["href"]}\"";
			$generatedHtmlContent .= wrapStringInHtmlTag($navbar_item["text"], "a", $navItemAttrs);

		}
	}

	return $generatedHtmlContent;

}

?>