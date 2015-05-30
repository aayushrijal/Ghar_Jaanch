<?php
	if( isset($_GET['id']) ){	
		$outputarray = array();
		$imagearray = array();

		$houseid = $_GET['id'];
		include("database.init.php");
		$conn = mysql_connect($DB_host,$DB_user,$DB_password);
		if( !$conn){
			echo "ERROR: ERROR IN CONNECTION";
		}
		mysql_select_db("Ghar");	

/* FOR THE DATA OF THE HOUSE*/
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




/* FOR THE IMAGE*/
		$sql = "SELECT * FROM photo where pid = '$houseid';";
		$retval = mysql_query($sql,$conn);
		if( !$retval ) {
			echo "ERROR:";
		}
		$count = 1;
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC) ){
			if( $count == 1 ){
				if( $row['filename'] != NULL )
				$imagearray['p1'] = $row['filename'];
				else
				$imagearray['p1'] = "";
			}
			if( $count == 2 ){
                                if( $row['filename'] != NULL )
                                $imagearray['p2'] = $row['filename'];                   
                                else
                                $imagearray['p2'] = "";
                        }
			if( $count == 3 ){
                                if( $row['filename'] != NULL )
                                $imagearray['p3'] = $row['filename'];                   
                                else
                                $imagearray['p3'] = "";
                        }
			if( $count == 4 ){
                                if( $row['filename'] != NULL )
                                $imagearray['p4'] = $row['filename'];                   
                                else
                                $imagearray['p4'] = "";
                        }
			if( $count == 5 ){
                                if( $row['filename'] != NULL )
                                $imagearray['p5'] = $row['filename'];                   
                                else
                                $imagearray['p5'] = "";
                        }
			$count++;
		}

		$count = 1;
		foreach( $imagearray as $x){
		$outputarray["p$count"] = $imagearray["p$count"];
		$count++;
		}


/* FOR THE FLAG */

		$sql = "SELECT AVG(flag) FROM blog where id ='$houseid';";
		$retval = mysql_query($sql,$conn);
		if( !$retval ){
			echo "ERROR!!!!! ";
		}
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
			$flag = $row['AVG(flag)'];
		}
		$outputarray['flag'] = $flag;
 

		$json_output = json_encode($outputarray);
		echo $json_output;		

	}else{
		echo "ERROR";
	}

