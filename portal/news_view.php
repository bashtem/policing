<?php
session_start();
include ("../session.php");
$time = $_GET['tyme'];
$sql = "SELECT * FROM news where time='$time'";
$query = mysqli_query($dbconnect,$sql);
$row = mysqli_fetch_array($query);

?>

<div style="background-color: #878787" class="newmodal-content">
    	   <span id="treatclose" onclick="treatclose()" class="newclose">x</span><br>                              
           <h3 class="text-center" style="color: white" >INFO</h3><hr/>  

        <div class="row">
			            <div class="form-group text-center">
			              		<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">DATE / TIME :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         
						                         <?php echo $row['date'] ?>
						                    </div>
                    			</div>
                    			<div class="col-md-12">
						                    <div class="col-md-6">
						                         
						                         <label style="text-align: justify;">IPO :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                         
						                         <?php echo $row['force_id'] ?>
						                    </div>
                    			</div>		                    
			    
				                <input readonly value="<?php echo strtoupper($row['subject']) ?>" required type="text" name="subject" class="form-control"><hr>
				                <textarea  rows="6" readonly required name="newsinfo" class="form-control" ><?php echo $row['information']?></textarea><p></p>
				              	                         
			                  
			            </div>   
            </div>                 


   </div>