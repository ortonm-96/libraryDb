<?php
function uploadImage($files){
	// Takes a _FILES array, checks it meets the file type/size limit
	// then attempts to upload it.
	// On success, return the path to the uploaded file. On failure, return False.

	// Config
	$currentDirectory = getcwd();
	$uploadDirectory = "uploads/";
	$fileExtensionsAllowed = ['jpeg','jpg','png', 'gif']; // These will be the only file extensions allowed 
	$fileLimitMb = 5; // File limit in MB
	$uploadOk = true;

	$fileName = $files['fileToUpload']['name'];
	$fileSize = $files['fileToUpload']['size'];
	$fileTmpName  = $files['fileToUpload']['tmp_name'];
	$fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

	$uploadPath = $currentDirectory . "/". $uploadDirectory . basename($fileName); 

	/* Meanings of the different error codes that could be in $files. I should make sure each of these conditions are accounted for.
	$phpFileUploadErrors = array(
	    0 => 'There is no error, the file uploaded with success',
	    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
	    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
	    3 => 'The uploaded file was only partially uploaded',
	    4 => 'No file was uploaded',
	    6 => 'Missing a temporary folder',
	    7 => 'Failed to write file to disk.',
	    8 => 'A PHP extension stopped the file upload.',
	);
	*/
	// Very basic error behaviour - just return early if everything isn't ok
	if ($files["fileToUpload"]["error"] != 0) {
		return False;
	}

	// Check if image file is an actual image or fake image
	/*
	if (isset($_POST["submit"])) {
		if (getimagesize($fileTmpName) !== false) {         //or 0 or null
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = true;
		} else {
			echo "File is not an image.";
			$uploadOk = false;
		}
	}
	*/
	// Check if file already exists
	if (file_exists($uploadPath)) {
		echo "File already exists.";
		$uploadOk = false;
	}

	// Check file size
	if ($fileSize > ($fileLimitMb * 100000)) {
		echo "File must be less than" . $fileLimitMb . "MB.";
		$uploadOk = false;
	}


	// Check if the filetype is one of the allowed options
	if(!in_array($fileType, $fileExtensionsAllowed))  {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = false;
	}



	// Check if $uploadOk then process
	if ($uploadOk == false) {
		echo "File couldn't be uploaded.";
		return False;
	} else {
		if (move_uploaded_file($fileTmpName, $uploadPath)) {
			echo "The file ". basename($fileName). " has been uploaded.";
			return $uploadDirectory . basename($fileName);
		} else {
			echo "Sorry, there was an error uploading your file.";
			return False;
		}
	}
}
?>