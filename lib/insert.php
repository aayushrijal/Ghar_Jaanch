<?php
	if( isset($_GET['title']) ){
		$title = $_GET['title'];
		$house = $_GET['house'];
		$description = $_GET['description'];
		$nos = $_GET['nos'];
		$year = $_GET['year'];
		$loc = $_GET['loc'];
		$cordinates = $_GET['coordinates'];
	

		$conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: ERROR IN CONNECTION";
                }
                mysql_select_db("Ghar");
		
		$sql = 
			
			
			
