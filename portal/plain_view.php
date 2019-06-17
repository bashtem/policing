<?php
session_start();
include ("../session.php");

$time = $_GET['tyme'];
$sqlplain = "SELECT * FROM plain_form where time='$time'";
$queryplain = mysqli_query($dbconnect,$sqlplain);
if(mysqli_num_rows($queryplain)==1){

	$rowplain = mysqli_fetch_array($queryplain);
	if(($rowplain['passport']=='') && ($rowplain['sex']=='M')){

				$photo = "../suspect/male2.png";

				}elseif (($rowplain['passport']=='') && ($rowplain['sex']=='F')) {
					$photo = "../suspect/female2.png";
				}else{
					$photo = $rowplain['passport'];
				}
}else{

	echo "DB CONNECTION ERROR !";
}



?>



<div style="background-color: #8EC8FF" class="newmodal-content">
    <span id="treatclose" onclick="treatclose()" class="newclose">x</span><br>
                              
           <h3 class="text-center" >PLAIN FORM</h3><hr/>   
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
			                         
			                         <?php echo substr($rowplain['date'],10,16) ?>
			                    </div>
                    </div>


                    <div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                        <label style="text-align: justify;">STATION :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                    	 
			                          <?php //echo strtoupper($rowplain['lname']." ".$rowplain['fname']) ?>
			                          <?php echo strtoupper($rowplain['station'])?>
			                    </div>
                    </div>


                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">COMMAND :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">

			                          <?php //echo strtoupper($rowcaution['lname']." ".$rowcaution['fname']) ?>
			                          <?php echo strtoupper($rowplain['command'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">FIRST NAME :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                    		<b><?php echo strtoupper($rowplain['fname'])?></b>
			                          
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        	  <label style="text-align: justify;">LAST NAME :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                    		<b><?php echo strtoupper($rowplain['lname'])?></b>
					                      
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">SEX :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                      <?php echo strtoupper($rowplain['sex'])?>
			                    </div>
                    </div>
                     <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">AGE :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['age'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">OCCUPATION :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['occupation'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">RELIGION :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['religion'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">NATIONALITY :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['nation'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">ADDRESS :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['address'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">TELEPHONE NO. :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['telephone'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">E-MAIL :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo $rowplain['email']?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">INTERPRETER :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['interpreter'])?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">RECORDER :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                                           <?php echo strtoupper($rowplain['recorder'])?>
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
			                        <textarea class="form-control" rows="15"><?php echo $rowplain['comments']?></textarea>
			                        	
			                        			
			                        

			                    </div>
			                    
                    </div>
                    
                    
                      
                         
                         
                  
            </div>   
            </div>                 


   </div>