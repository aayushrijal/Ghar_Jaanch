<?php
	

	$hid = 1;
	$eid = 3435;
	$comment = "This can be reconstructed with the help of retrofitting and grouting methods. It will be good enough if you live in temporary shelter untill the reconstruction is done";
	$flag = 2;
	
	  include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: ERROR IN CONNECTION";
                }
                mysql_select_db("Ghar");

		$sql = "INSERT INTO blog".
			"(hid,eid,comment,flag)".
			"values('$hid','$eid','$comment','$flag');";
		$retval = mysql_query($sql,$conn);
		if(!$retval)
			echo "ERROR";
		else 
			echo "OK";

