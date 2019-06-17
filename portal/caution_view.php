<?php
session_start();
include ("../session.php");


$time = $_GET['tyme'];
$sqlcaution = "SELECT * FROM caution_form where time='$time'";
$querycaution = mysqli_query($dbconnect,$sqlcaution);
if(mysqli_num_rows($querycaution)==1){

	$rowcaution = mysqli_fetch_array($querycaution);
			if(($rowcaution['passport']=='') && ($rowcaution['sex']=='M')){

				$photo = "../suspect/male2.png";

				}elseif (($rowcaution['passport']=='') && ($rowcaution['sex']=='F')) {
					$photo = "../suspect/female2.png";
				}else{
					$photo = $rowcaution['passport'];
				}

}else{

	echo "DB CONNECTION ERROR !";
}



?>


<div style="background-color: #FF8080" class="newmodal-content">
    <span id="treatclose" onclick="treatclose()" class="newclose">x</span><br>
                              
           <h3 class="text-center" >CAUTION FORM</h3><hr/>   
        <div class="row">
            <div class="form-group text-center">

            		<div class="col-md-12">
			                    <img id="passport" style=" width:200px; height:200px" src=<?php echo $photo ?> >
			                    <p></p>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                         <label style="text-align: justify;"></label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                         
			                       
			                    </div>
                    </div>
              

              		<div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                         <label style="text-align: justify;">TIME :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                         
			                         <?php echo substr($rowcaution['date'],10,16) ?>
			                    </div>
                    </div>


                    <div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                        <label style="text-align: justify;">STATION :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                    	 
			                          <?php //echo strtoupper($rowplain['lname']." ".$rowplain['fname']) ?>
			                          <?php echo strtoupper($rowcaution['station'])?>
			                    </div>
                    </div>


                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">COMMAND :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">

			                          <?php //echo strtoupper($rowcaution['lname']." ".$rowcaution['fname']) ?>
			                          <?php echo strtoupper($rowcaution['command'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">FIRST NAME :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                    		<b><?php echo strtoupper($rowcaution['fname'])?></b>
			                          
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        	  <label style="text-align: justify;">LAST NAME :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                    		<b><?php echo strtoupper($rowcaution['lname'])?></b>
					                      
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">SEX :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                      <?php echo strtoupper($rowcaution['sex'])?>
			                    </div>
                    </div>
                     <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">AGE :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['age'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">OCCUPATION :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['occupation'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">RELIGION :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['religion'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">NATIONALITY :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['nation'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">ADDRESS :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['address'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">TELEPHONE NO. :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['telephone'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">E-MAIL :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo $rowcaution['email']?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">INTERPRETER :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['interpreter'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">RECORDER :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowcaution['recorder'])?>
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
			                       
			                        <label style="text-align: justify;">COMMENTS :</label><br>
			                        <textarea class="form-control" rows="15"><?php echo $rowcaution['comments']?></textarea>
			                        	
			                        			
			                        

			                    </div>
			                    
                    </div>
                    
                    
                      
                         
                         
                  
            </div>   
            </div>                 


   </div>