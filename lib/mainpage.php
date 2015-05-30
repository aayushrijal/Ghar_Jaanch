<?php
	$imagearray = array();
	$titlearray = array();
	$idarray = array();	
	$descarray = array();
	$locationarray = array();
	$flagarray = array();	

	$outputarray = array();	

	 include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: ERROR IN CONNECTION";
                }
                mysql_select_db("Ghar");

	
		$sql = "select * from gharinfo;";
		$retval = mysql_query($sql,$conn);
		if( !$retval ){		
			echo "ERROR";
		}
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC) ){
			array_push($idarray,$row['id']);
			array_push($titlearray,$row['title']);
			array_push($descarray,$row['Description']);
			array_push($locationarray,$row['location']);
		}

	
/* For getting the image of the first image
*/	
		foreach($idarray as $x){
			$sql = "SELECT pid,filename from photo where pid<5000 LIMIT 1;";
			$retval = mysql_query($sql,$conn);
			if( !$retval ){
				echo "ERROR";	
			}
			while( $row = mysql_fetch_array($retval,MYSQL_ASSOC) ){
				$temp = $row['filename'];
			}
			array_push($imagearray,$temp);
		}
			
		 	 		
					
		array_push($outputarray,$imagearray);
		array_push($outputarray,$idarray);
		array_push($outputarray,$titlearray);
		array_push($outputarray,$descarray);
		array_push($outputarray,$locationarray);
		
		$output = array("info"=>$outputarray);
		echo json_encode($output);
