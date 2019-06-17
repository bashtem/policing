<?php
session_start();
include("../session.php");


/*$sqlsec = "SELECT * FROM ipo WHERE active=0 order by fname asc";
$query = mysqli_query($dbconnect, $sqlsec);*/
include("../pagination.php");
page($dbconnect,'ipo','active','0','10','page_disagent','fname');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];


?>

<div>
	<table class="table table-striped table-hover table-bordered">
		<tr style="background-color: #4D4D4D; color:white ; text-align: center">
		<td>ID</td>
		<td style="background-color: #4D924D">DIVISION</td>
		<td>FIRST NAME</td>
		<td>LAST NAME</td>
		<td style="background-color: #009999">RANK</td>
		<td style="background-color: #6666FF">FORCE ID</td>
		<td>PROFILE</td>
		<td >STATE</td>
		<td >MOBILE</td>
		</tr>


<?php 
		$no = 1;
		while($row=mysqli_fetch_array($query)){
?>
<tr style='text-align: center; background-color: #ACB2AF'>
		<td> <?php echo $no ?> </td>
		<td> <?php echo strtoupper($row['division']) ?> </td>
		<td style='color:red; font-weight: bold;'><?php echo strtoupper($row['fname']) ?></td>
		<td style='color:red; font-weight: bold;'><?php echo strtoupper($row['lname'])?></td>
		<td ><?php echo $row['rank']?></td>
		<td style='color:red; font-weight: bold;'><a href='#'><?php echo $row['force_id']?></a></td>
		<td><a href='#' onclick="agent_profile(<?php echo $row['force_id']?>);" >VIEW <span class='	glyphicon glyphicon-eye-open'></span></a></td>
		<td style='color:red; font-weight: bold;'><a href='#'><?php echo strtoupper($row['state'])?></a></td>
		<td style='color:red; font-weight: bold;'><a href='#'><?php echo$row['telephone']?></a></td>
		</tr> 
<?php
//echo $row['division'];

			$no++;
}

?>
	</table>
</div>
<center>
	<ul  class="pagination pagination-sm">
        
        <?php
		if($page_no>1){
			
		echo	"
        <li><a href=\"#\" onclick=\"page('disabled_ipo.php','page_disagent','bodyagent', $page_no-1);\"  >Previous</a></li>";		
		}
		

		for($x=1;$x<=$pages;$x++){
		echo ($page_no==$x)? "<li><a href='#' onclick=\"page('disabled_ipo.php','page_disagent','bodyagent','$x');\"  ><b style=\"color:red\">$x</b></a></li>" : "<li><a href='#' onclick=\"page('disabled_ipo.php','page_disagent','bodyagent','$x');\" >$x</a></li>";
		}


		if($page_no<$pages){
		echo "<li><a href=\"#\" onclick=\"page('disabled_ipo.php','page_disagent','bodyagent',$page_no+1);\" >Next</a></li>";
		}
		
		
		?>
       
      </ul>
</center>