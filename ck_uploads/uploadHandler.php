<?php

	$orgfilename = $_FILES["upload"]["name"];

	$exp_file_name = explode('.', $orgfilename);

	$date = new DateTime();
	//echo $date->getTimestamp();

	$fileextension =  $exp_file_name[sizeof($exp_file_name)-1];

	$filename = $date->getTimestamp().".".$fileextension;

	move_uploaded_file($_FILES["upload"]["tmp_name"],
		"uploads/" . $filename);
	//echo "Stored in: " . "uploads/" . $_FILES["upload"]["name"];

	$full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	$exp_full_url = explode('ck_uploads', $full_url);

	// Required: anonymous function reference number as explained above.
	$funcNum = $_GET['CKEditorFuncNum'] ;
	// Optional: instance name (might be used to load a specific configuration file or anything else).
	$CKEditor = $_GET['CKEditor'] ;
	// Optional: might be used to provide localized messages.
	$langCode = $_GET['langCode'] ;

	// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
	$url = $exp_full_url[0]. "ck_uploads/uploads/" . $filename;
	// Usually you will only assign something here if the file could not be uploaded.
	$message = '';

	echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

?>


