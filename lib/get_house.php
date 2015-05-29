<?php
	if( isset($_GET['id']) ){	
		$outputarray = array();
		$houseid = $_GET['id'];
		include("database.init.php");
		$conn = mysql_connect($DB_host,$DB_user,$DB_password);
		if( !$conn){
			echo "ERROR: ERROR IN CONNECTION";
		}
		mysql_select_db("Ghar");	
		$sql = "SELECT * FROM gharinfo where id = '$houseid';";
		$retval = mysql_query($sql,$conn);
		if( !$retval){
			echo "ERROR:";
		}	

		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC) ){
			$id = $row['id'];
			$title = $row['title'];
			$houseSystem = $row['houseSystem'];
			$description = $row['Description'];
			$noofstoreys = $row['noofstoreys'];
			$yearbuilt = $row['yearbuilt'];
			$location = $row['location'];
			$coordinates = $row['coordinates'];
		}		
		$outputarray['id'] = $id;
		$outputarray['title'] = $title;
		$outputarray['houseSystem'] = $houseSystem;
		$outputarray['description'] = $description;
		$outputarray['noofstoreys'] = $noofstoreys;
		$outputarray['yearbuilt'] = $yearbuilt;
		$outputarray['location'] = $location;
		$outputarray['coordinates'] = $coordinates;
		$json_output = json_encode($outputarray);
		echo $json_output;
	}else{
		echo "ERROR";
	}

