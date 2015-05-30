<?php
	
	if( isset($_GET['title']) ){
		$title = $_GET['title'];
		$hs = $_GET['houseSystem'];	//houseSystem
		$ns = $_GET['noofstoreys'];
		$des = $_GET['Description'];
		$loc = $_GET['location'];
		$yb = $_GET['yearbuilt'];
		$coordinates = $_GET['coordinates'];
	
		include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: ERROR IN CONNECTION";
                }
                mysql_select_db("Ghar");

		$sql = "INSERT into gharinfo".
			"(title,houseSystem,Description,noofstoreys,yearbuilt,location,coordinates) ".
			"values( '$title','$hs','$des','$ns','$yb','$loc','$coordinates' );";
		
		$retval = mysql_query($sql,$conn);
		if( !$retval){
			echo "ERROR: ERROR IN ENTRY";
		}else{
			$sql = "SELECT id from gharinfo where title = '$title';";
			$retval = mysql_query($sql,$conn);
			while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
				$temp = $row['id'];
			}
			
			$output = array("id"=> $temp);
			
			echo json_encode($output);
		}


	}else{
		echo "NO DATA";
	}
			
