<?php
	$target_path = "uploads/";
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

	$filename = $_FILES['uploadedfile']['name'];
	
	 if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path)){
		echo "success";
	}else{
		echo "Error";
	}

