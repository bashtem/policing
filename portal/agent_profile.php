<?php
session_start();
include ("../session.php");

$profile = $_GET['id'];
$sqlagent = "SELECT * FROM ipo where force_id='$profile'";
$queryagent = mysqli_query($dbconnect,$sqlagent);
$rowagent = mysqli_fetch_array($queryagent);

if($rowagent['active']==0){
	$disable ="Account disabled";
}elseif($rowagent['active']==1){
	$disable ="";
}

?>



<div style="background-color: #DCE6E1" class="newmodal-content">
    <span id="agentclose" onclick="agent_close();" class="newclose">x</span><br>
                              
           <h3 class="text-center" >PROFILE</h3><hr/>   
        <div class="row">
	            <div class="form-group text-center">
	              <form method="POST" role="form" onsubmit="return ;">

	              		
	              		<div class="col-md-4">
				                    <img id="agent_passport" style=" width:200px; height:200px" src=<?php echo "../".$rowagent['passport'] ?> >
				                    <p></p>
				                    <p style="color: red; font-style: italic;"><?php echo $disable ?></p>
	                    </div>             		
	                                
	                    <div class="col-md-8">
	                    	<div class="row">
	                    			<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;"> FIRST NAME :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         <?php echo strtoupper($rowagent['fname'])?>
						                       
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">LAST NAME :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         
						                       <?php echo strtoupper($rowagent['lname'])?>
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">SEX :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         
						                       <?php echo $rowagent['sex']?>
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">FORCE ID :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         <?php echo $rowagent['force_id']?>
						                         <input type="text" hidden name="id" value="<?php echo $rowagent['force_id']?>">
						                       
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">RANK :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         
						                       <?php echo strtoupper($rowagent['rank'])?>
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">DIVISION :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         
						                       <?php echo strtoupper($rowagent['division'])?>
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">SECTION :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         
						                       <?php echo strtoupper($rowagent['section'])?>
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">STATE :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         <?php echo strtoupper($rowagent['state'])?>
						                       
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">E-MAIL :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
								                         
						                       					<?php echo $rowagent['email']?>
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">PHONE NUMBER :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         <?php echo $rowagent['telephone']?>
						                       
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">Activate :</label>
						                         
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         Yes <input type="radio" required value="1" name="active"> |
						                         No <input type="radio" value="0" name="active">
						                       
						                    </div>
                    				</div>
                    				<div class="col-md-12">
						                    <p></p>
                    				</div>

	                    		
	                    		
	                    	</div>
	                       	                         
	                    </div>

	                         
	                     <input type="submit" name="update_agent_profile" class="btn btn-success text-center" value="UPDATE">  
	               </form>   
	            </div>   
         </div>                 


   </div>