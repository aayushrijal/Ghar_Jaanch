<?php 

	if( $_GET['id']){
		$id = $_GET['id'];
	}else{
    		$id = 33;	//get this from the ajax request
	}

    $targetpath = "uploads/";	
    extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("uploads/".$file_name))
                    {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$file_name);
/* THIS IS THE ACTUAL LOCATION OF THE FILE UPLOADED*/	
		echo $targetpath.basename($_FILES["files"]["name"][$key]);	

/* INSERT INTO THE DATABASE THE pid = id of the gharinfo and the actual file */
		 include("database.init.php");
                $conn = mysql_connect($DB_host,$DB_user,$DB_password);
                if( !$conn){
                        echo "ERROR: ERROR IN CONNECTION";
                }
                mysql_select_db("Ghar");

		$imagefile = basename($_FILES["files"]["name"][$key]);
		$sql = "INSERT INTO photo".
			"(pid,filename) ".
			"values( '$id', '$imagefile');";
		$retval = mysql_query($sql,$conn);
		if( !$retval ) {
			echo "ERROR IN database upload";
		}else{
			echo "UPloaded successfully";
		}
		




                    }
                    else
                    {
                        $filename= basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"uploads/".$newFileName);
		
                    }
			
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }

