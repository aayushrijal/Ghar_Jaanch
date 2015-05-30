<?php
	if( isset($_GET['pid'] )) {		// pid is hid of the blod table 
						//hid refers to the house id 
		$hid = $_GET['pid'];
		$eid = "";	// eid for handling engineer_id and names etc
		$ename = "";
		$outputarray = array();
	
		$temparray = array();		
		$data = array();

		include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: ERROR IN CONNECTION";
                }
                mysql_select_db("Ghar");

/* get the comments and put result as comment, engineer_name,eid, flag
*/


                        $sql = "SELECT * from blog where hid ='$hid';";
                        $retval = mysql_query($sql,$conn);
                        if(!$retval){
                                echo "ERROR:";
                        }
                        while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)){
                                $temparray['comment'] = $row['comment'];
                                $temparray['eid'] = $row['eid'];
                                $temparray['flag'] = $row['flag'];	
			
	
				array_push($outputarray,$temparray);
                        }
			
			echo json_encode($outputarray);

			
			
			














/*Tests

		$sql = "SELECT eid from blog where hid='$hid';";
		$retval = mysql_query($sql,$conn);
		if( !$retval) {
			echo "ERROR::";
		}
		while( $row = mysql_fetch_array($retval,MYSQL_ASSOC)) {
			$eid = $row['eid'];	
		}
	
		}
*/
	}else{
		echo "ERROR";
	}

