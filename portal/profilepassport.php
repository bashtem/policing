<?php
include ("../session.php");


if(isset($_FILES["profilepassport"]["type"])){
      
           $type = $_FILES['profilepassport']['type'];
                        
       if ( ($type == "image/png") || ($type== "image/jpg") || ($type== "image/jpeg")  ) {

                $sourcePath = $_FILES['profilepassport']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "../profile/".$_FILES['profilepassport']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath); // Moving Uploaded file
                $sqlpassport = "UPDATE ipo SET passport='$targetPath' where force_id= '$force_id' ";
                $querypassport =mysqli_query($dbconnect,$sqlpassport);
        if($querypassport){

           // echo "*** Passport Updated ! ***";
        }else{
           // echo "Pasport Update Failed !";
        
			}

}else{

	//echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}

?>