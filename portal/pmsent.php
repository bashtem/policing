<?php
session_start();
include ("../session.php");

include("../pagination.php");
page($dbconnect,'pm','sender_id',$force_id,'10','page_pmsent','time');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];
?>

<div   id="sent">
						<p style="color:green; font-size: 20px; letter-spacing: 10px; text-align:center; ">Sent</p><hr>
				<table class="table table-striped table-hover ">
								<tr style="background-color: black; color:white ; text-align: center">
								<td>ID</td>
								<td style="background-color: #4D924D">Subject</td>								
								<td>DATE / TIME</td>								
								</tr>

	<?php

/*			$sqlpm="SELECT * FROM pm where sender_id='$force_id' order by time desc";
			$query = mysqli_query($dbconnect,$sqlpm);*/


			if($query){

				//echo "success<br>";
						$no = 1;
			while($rows=mysqli_fetch_array($query)){


?>							
				
						<tr id='<?php echo "row".$no ?>' style="text-align: center">

									<td><?php echo $no; ?></td>
									<td style='color:#999999; font-weight: bold;'>
	<a href="#" style="text-decoration: none" id="sentmsg" onclick="view_inbox(<?php echo $rows['time']?>, '<?php echo "row".$no ?>',1)">
											<?php echo substr(trim($rows['subject']),0,8)."..."; ?>
											<span style="font-size: 13px; " class="glyphicon glyphicon-eye-open"></span></a>
									</td>
									<td><?php echo $rows['date']; ?></td>
								
						</tr>
				

			

<?php
	$no++;
}
	}

?>

</table>

		</div>
<center>
	<ul  class="pagination pagination-sm">
        
        <?php
		if($page_no>1){
			
		echo	"
        <li><a href=\"#\" onclick=\"page('pmsent.php','page_pmsent','pmcontent', $page_no-1);\"  >Previous</a></li>";		
		}
		

		for($x=1;$x<=$pages;$x++){
		echo ($page_no==$x)? "<li><a href='#' onclick=\"page('pmsent.php','page_pmsent','pmcontent','$x');\"  ><b style=\"color:red\">$x</b></a></li>" : "<li><a href='#' onclick=\"page('pmsent.php','page_pmsent','pmcontent','$x');\" >$x</a></li>";
		}


		if($page_no<$pages){
		echo "<li><a href=\"#\" onclick=\"page('pmsent.php','page_pmsent','pmcontent',$page_no+1);\" >Next</a></li>";
		}
		
		
		?>
       
      </ul>
</center>