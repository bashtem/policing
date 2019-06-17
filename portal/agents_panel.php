<?php
session_start();
include("../session.php");

/*if(isset($_GET['section'])){
$_SESSION['section']=$_GET['section'];
}else{
$section =$_SESSION['section'];
}
*/
if(isset($_GET['section'])){
$_SESSION['section']=$section= $_GET['section'];

}else{
	$section=$_SESSION['section'];
}

/*if($section!=""){
		$sqlsec = "SELECT * FROM ipo WHERE section LIKE '%$section%' order by fname desc";
}else{
		$sqlsec = "SELECT * FROM ipo order by fname asc";
}
$query = mysqli_query($dbconnect, $sqlsec);*/

include("../pagination.php");
page($dbconnect,'ipo','section',$section,'10','page_agent','fname','sec');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];

?>

<div>
	<table class="table table-striped table-hover ">
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
			if($row['active']==0)
				$color= "#ACB2AF";
			else
				$color= "";
?>
<tr style='text-align: center; background-color: <?php echo $color ?>'>
		<td> <?php echo $no ?> </td>
		<td> <?php echo strtoupper($row['division']) ?> </td>
		<td style='color:red; font-weight: bold;'><?php echo strtoupper($row['fname']) ?></td>
		<td style='color:red; font-weight: bold;'><?php echo strtoupper($row['lname'])?></td>
		<td ><?php echo strtoupper($row['rank'])?></td>
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
        <li><a href=\"#\" onclick=\"page('agents_panel.php','page_agent','bodyagent', $page_no-1);\"  >Previous</a></li>";		
		}
		

		for($x=1;$x<=$pages;$x++){
		echo ($page_no==$x)? "<li><a href='#' onclick=\"page('agents_panel.php','page_agent','bodyagent','$x');\"  ><b style=\"color:red\">$x</b></a></li>" : "<li><a href='#' onclick=\"page('agents_panel.php','page_agent','bodyagent','$x');\" >$x</a></li>";
		}


		if($page_no<$pages){
		echo "<li><a href=\"#\" onclick=\"page('agents_panel.php','page_agent','bodyagent',$page_no+1);\" >Next</a></li>";
		}
		
		
		?>
       
      </ul>
</center>