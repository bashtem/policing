<?php
session_start();
include("../session.php");

$force_id_search=$_GET['search_force_id'];
$sqlsec = "SELECT * FROM ipo WHERE force_id='$force_id_search' order by fname asc";

$query = mysqli_query($dbconnect, $sqlsec);

/*include("../pagination.php");
page($dbconnect,'ipo','force_id',$force_id_search,'1','page_agent_search','fname');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];*/

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
		if(mysqli_num_rows($query)==1){
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
}}else{

	echo "<p style='color:red; font-style:italic'>No Record Found!</p>";
}

?>
	</table>
</div>
