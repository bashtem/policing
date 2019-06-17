<?php
session_start();
include ("../session.php");


$time = $_GET['tyme'];
$sqlplain = "SELECT * FROM plain_form where time='$time'";
$sqlcaution = "SELECT * FROM caution_form where time='$time'";
$queryplain = mysqli_query($dbconnect,$sqlplain);
$querycaution = mysqli_query($dbconnect,$sqlcaution);
if(mysqli_num_rows($queryplain)==1){

	$rowplain = mysqli_fetch_array($queryplain);
}else{

	echo "DB CONNECTION ERROR !";
}

if(mysqli_num_rows($querycaution)==1){

	$rowcaution = mysqli_fetch_array($querycaution);
}else{

	echo "DB CONNECTION ERROR !";
}

?>




<div style="background-color: #D17A7A" class="newmodal-content">
    <span id="treatclose" onclick="treatclose()" class="newclose">x</span><br>
                              
           <h3 class="text-center" style="color:white">TREAT CASE</h3><hr/>   
        <div class="row">
            <div class="form-group text-center">
              <form method="POST" role="form" onsubmit="return confirmtreat();">
              		<div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                         <label style="text-align: justify;">Date :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                         
			                         <?php echo substr($rowcaution['date'],0,8) ?>
			                    </div>
                    </div>


                    <div class="col-md-12">
			                    <div class="col-md-6">
			                         
			                        <label style="text-align: justify;">Complainant :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
			                    	 
			                          <?php echo strtoupper($rowplain['lname']." ".$rowplain['fname']) ?>
			                    </div>
                    </div>


                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">Suspect :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">

			                          <?php echo strtoupper($rowcaution['lname']." ".$rowcaution['fname']) ?>
			                    </div>
                    </div>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">Offence :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">

			                          <input class="form-control" required type="text" value="<?php echo $rowcaution['offence'] ?>" name="offence" placeholder="offence">
			                    </div>
                    </div>
                    <p style="color:#D17A7A ">BLANK</p>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        	  <label style="text-align: justify;">Detention :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">

					                      <select id="detain" required name="detain" onchange="cremark();" class="form-control">
							                    	<option value="">Select Option</option>
							                    	<option value="detained">Detain</option>
							                    	<option value="released">Release</option>
							              </select> 
			                    </div>
                    </div><br><br>
                    <div class="col-md-12">
			                    <div class="col-md-6">
			                       
			                        <label style="text-align: justify;">Remark :</label>
			                    </div>
			                    <div class="col-md-6" style="text-align: left">
					                    <select id="remark" required name="remark" class="form-control">
					                    	<option value="">Select your Remark</option>
					                    	<option value="pending">Pending</option>
					                    	<option value="u.i">U.I</option>
					                    	<option value="released">Released</option>
					                    </select>                         
			                    </div>
                    </div>
                    
                    <input type="text" hidden name="cautime" value="<?php echo $time ?>">
                    <div class="col-md-12">
                         <br>
                         <input type="submit" name="treat" class="btn btn-success text-center" value="Treat">
                    </div>    
                         
                         
               </form>   
            </div>   
            </div>                 


   </div> 

   <script type="text/javascript">
   	
   
   </script>