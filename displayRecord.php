<?php

function formatRecord($record){
	// Format the record as a table.
	// Generate a header row, then generate a row for the item (). Finally, wrap it all in table tags
	// All these .= operators and concating the same tags over and over again looks UGLY. Is there a cleaner way to do this?

	// Placeholder header row - Take this as an argument later
	$headerRow = ["isbn", "name", "description"];

	// What's the php syntax to get the index of an item in an array?
	// What happens to that if I pass it an array with 2 of the same items?
	$headerHtml = "<tr>";

	// Generate the header row
	foreach ($headerRow as $header) {
		$headerHtml .= "<th>" . $header . "</th>";
	}

	$headerHtml .= "</tr>";

	// Generate the content row (later, put this in a loop to generate multple rows)
	$itemHtml = "<tr>";
	foreach ($headerRow as $header) {
		$itemContent = $record[$header] ?: "";
		$itemHtml .= "<td>" . $itemContent . "</td>";
	}
	$itemHtml .= "</tr>";

	$output = "<table>" . $headerHtml . $itemHtml . "</table>";
	return $output;
}

?>