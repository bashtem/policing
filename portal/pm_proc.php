<?php
session_start();
include ("../session.php");

if(isset($_GET['value'])){
	if($_GET['title']==0){
		$title="SENDER :";
		$id="sender_id";
	}else{
		$title="RECEPIENT :";
		$id="receiver_id";
	}
$valuee = $_GET['value'];
$sqlpm="UPDATE pm SET  checked=1 where time='$valuee'";
$sqlread= "SELECT * FROM pm where time='$valuee'";
$query = mysqli_query($dbconnect,$sqlpm);
$queryread = mysqli_query($dbconnect,$sqlread); 
$row_read=mysqli_fetch_array($queryread);
?>

<div style="background-color: 	#DCDCDC" class="newmodal-content">
    <span id="pmodal" onclick="pmclose()" class="newclose">x</span><br>
                              
           <h3 class="text-center" >Private Message</h3><hr/>   
        <div class="row">
            <div class="form-group text-center">

            		
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                         <label style="text-align: justify;"></label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                         
			                       
			                    </div>
                    </div>
              

              		<div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                         <label style="text-align: justify;">DATE / TIME :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                         
			                         <?php echo $row_read['date'] ?>
			                    </div>
                    </div>
                     <div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                         <label style="text-align: justify;"><?php echo $title ?></label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                         
			                         <?php echo strtoupper($row_read[$id]) ?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                         <label style="text-align: justify;">SUBJECT :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                         
			                         <?php echo strtoupper($row_read['subject']) ?>
			                    </div>
                    </div>

                 
                    
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;"></label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           
			                    </div>
                    </div>
                   
                    <div class="col-md-12">
			                    <div class="col-md-12">
			                       
			                        <label style="text-align: justify;">Message :</label><br>
			                        <textarea class="form-control" rows="10"><?php echo $row_read['message']?> </textarea>	            	
			                  
			                       

			                    </div>
			                    
                    </div>
                    
                    
                      
                         
                         
                  
            </div>   
            </div>                 


   </div>


<?php

}else if(isset($_GET['data'])){

$data = $_GET['data'];
$sqlpm="SELECT * FROM `pm` WHERE checked = 0 AND receiver_id = '$force_id'";
$query = mysqli_query($dbconnect,$sqlpm);
$num_rows = mysqli_num_rows($query);

	echo $num_rows;


}


?>