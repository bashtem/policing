<?php
session_start();
include ("../session.php");


$time = $_GET['tyme'];
$sql = "SELECT * FROM cell_board where caution_time='$time'";
$sql2 = "SELECT * FROM caution_form where time='$time'";
$query = mysqli_query($dbconnect,$sql);
$query2 = mysqli_query($dbconnect,$sql2);
$row = mysqli_fetch_array($query);
$row2 = mysqli_fetch_array($query2);
?>


<div style="background-color: #E6C200" class="newmodal-content">
    	   <span id="treatclose" onclick="treatclose()" class="newclose">x</span><br>                              
           <h3 class="text-center" >HISTORY</h3><hr/>  

        <div class="row">
			            <div class="form-group text-center">
			              				                    
			                    <div class="col-md-12">
						                    <div class="col-md-6">
						                       
						                        <label style="text-align: justify;">FIRST NAME :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                    		<b><?php echo strtoupper($row2['fname'])?></b>
						                          
						                    </div>
			                    </div>
			                    <div class="col-md-12">
						                    <div class="col-md-6">
						                       
						                        	  <label style="text-align: justify;">LAST NAME :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
						                    		<b><?php echo strtoupper($row2['lname'])?></b>
								                      
						                    </div>
			                    </div>
			                    
			                    
			                    <div class="col-md-12">
						                    <div class="col-md-6">
						                       
						                        <label style="text-align: justify;">OFFENCE :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
								                                           <?php echo strtoupper($row2['offence'])?>
						                    </div>
			                    </div>
			                    <div class="col-md-12">
						                    <div class="col-md-6">
						                       
						                        <label style="text-align: justify;">DATE / TIME DETAINED :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
								                                           <?php echo strtoupper($row['date_detained'])?>
						                    </div>
			                    </div>
			                    <div class="col-md-12">
						                    <div class="col-md-6">
						                       
						                        <label style="text-align: justify;">DATE / TIME RELEASED :</label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
								                                           <?php echo strtoupper($row['date_released'])?>
						                    </div>
			                    </div>
			                    <div class="col-md-12">
						                    <div class="col-md-6">
						                       
						                        <label style="text-align: justify;"></label>
						                    </div>
						                    <div class="col-md-6" style="text-align: left">
								                                           
						                    </div>
			                    </div><hr> 
			                         
			                  
			            </div>   
            </div>                 


   </div>