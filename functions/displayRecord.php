
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

?>