<?php
session_start();
include ("../session.php");

include("../pagination.php");
page($dbconnect,'log_out','force_id',$force_id,'5','page_logout','id');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];

?>

<div class="row">
			<div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-4">
								                         
								                   <label style="text-align: justify;"></label>
								  </div>
								  <div class="col-md-4" style="text-align: left">
								                         
								                    <h5 ><u>Logout History</u></h5>
								  </div>
								  <div class="col-md-4" style="text-align: left">
								                         
								                   

								  </div>
					</div>			  
		    </div>

<?php   
		while($row=mysqli_fetch_array($query)){


?>			    
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-6">
								                         
								                   <label style="text-align: justify;">Date :</label>
								  </div>
								  <div class="col-md-6" style="text-align: left">
								                         
								                   <?php echo $row['logout_date']?>

								  </div>
								  
					</div>			  
		    </div>
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <div class="col-md-6">
								                         
								                   <label style="text-align: justify;">Time :</label>
								  </div>
								  <div class="col-md-6" style="text-align: left">
								                         
								                    <?php echo $row['logout_time']?>
								  </div>
								  
					</div>			  
		    </div>
		    <div class="col-md-12">
					<div class="form-group text-center" >
								  <hr>
								  
					</div>			  
		    </div>

 <?php

}

?>
</div>		  
<center>
	<ul  class="pagination pagination-sm">
        
        <?php
		if($page_no>1){
			
		echo	"
        <li><a href=\"#\" onclick=\"page('logout_history.php','page_logout','log_body', $page_no-1);\"  >Previous</a></li>";		
		}
		

		for($x=1;$x<=$pages;$x++){
		echo ($page_no==$x)? "<li><a href='#' onclick=\"page('logout_history.php','page_logout','log_body','$x');\"  ><b style=\"color:red\">$x</b></a></li>" : "<li><a href='#' onclick=\"page('logout_history.php','page_logout','log_body','$x');\" >$x</a></li>";
		}


		if($page_no<$pages){
		echo "<li><a href=\"#\" onclick=\"page('logout_history.php','page_logout','log_body',$page_no+1);\" >Next</a></li>";
		}
		
		
		?>
       
      </ul>
</center>