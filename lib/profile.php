<?php
	
	if( isset($_GET['eid'] ) ){
		$outputarray = array();

		$eid = $_GET['eid'];	
		include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: ERROR IN CONNECTION";
                }
                mysql_select_db("Ghar");
	
		$sql = "SELECT * FROM profile WHERE engineer_id = '$eid';";
		
		$retval = mysql_query($sql,$conn);
		if( !$retval ){
			echo "ERROR: ";
		}
		
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC) ){
			$name = $row['name'];
			$qualification = $row['qualification'];
			$experience = $row['experience'];
			$contact = $row['contact'];
			$eid = $row['engineer_id'];
		}
		
		$outputarray['name'] = $name;
		$outputarray['qualification'] = $qualification;
		$outputarray['experience'] = $experience;
		$outputarray['contact'] = $contact;
		$outputarray['eid'] = $eid;

		$json_output = json_encode($outputarray);
		
		echo $json_output;
	}else{
		echo "NO DATA FOUND";
	}
	


