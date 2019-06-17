<?php
session_start();
include ("../session.php");

include("../pagination.php");

page($dbconnect,'cell_board','detention','detained','10','page_cell','time_detained','cell');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];


?>

<div>
			<p style="color:#A80000 ; font-size:20px; text-align: center"><b>CELL STATE BOARD</b></p><hr>
				<table class="table table-striped table-hover table-bordered">
					<tr style="background-color: #4D4D4D; color:white ; text-align: center; ">
					<td>S/NO</td>
					<td style='background-color: #4EA24E'>NAME OF SUSPECT</td>
					<td>SEX</td>
					<td>DATE DETAINED</td>
					<td style='background-color:#880000  ; color:white;'>OFFENCE</td>
					<td>I.P.O</td>
					<td>SECTION</td>
					<td style='background-color: #FFFF66; font-weight: bold; color:black; '>REMARK</td>
					</tr>

		<?php 
		
				/*$sql ="SELECT caution_form.lname, caution_form.fname, caution_form.sex, caution_form.offence, caution_form.force_id, caution_form.remark,ipo.section, cell_board.date_detained, cell_board.time_detained  FROM caution_form,ipo,cell_board where caution_form.time=cell_board.caution_time AND caution_form.force_id=ipo.force_id AND cell_board.detention='detained' order by cell_board.time_detained desc";*/

				//$query= mysqli_query($dbconnect,$sql);

				if($query){
					$cnt = 1;

					while($rows=mysqli_fetch_array($query)){

						//echo $rows[0]."<br>";

?>

					<tr style="text-align: center">
					<td><?php echo $cnt ?></td>
					<td > <a href='#' style="text-decoration: none" onclick=<?php echo "caution_view(".$rows[6].")" ?> ><?php echo strtoupper($rows[0]." ".$rows[1]); ?> <span class="	glyphicon glyphicon-eye-open"></a></td>
					<td style='color:red; font-weight: bold;'><?php echo $rows[2] ?></td>
					<td><?php echo $rows[8]; ?></td>
					<td  ><?php echo strtoupper($rows[3]); ?></td>
					<td ><a href='#' style='color:green; text-decoration: none; font-weight: bold' ><?php echo $rows[4]; ?></a></td>
					<td style='color:#000080; font-weight: bold'><?php echo strtoupper($rows[7]); ?></td>
					<td ><?php echo strtoupper($rows[5]); ?></td>
					</tr>


<?php
					$cnt=$cnt+1;



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
        <li><a href=\"#\" onclick=\"page('cell_board.php','page_cell','content', $page_no-1);\"  >Previous</a></li>";		
		}
		

		for($x=1;$x<=$pages;$x++){
		echo ($page_no==$x)? "<li><a href='#' onclick=\"page('cell_board.php','page_cell','content','$x');\"  ><b style=\"color:red\">$x</b></a></li>" : "<li><a href='#' onclick=\"page('cell_board.php','page_cell','content','$x');\" >$x</a></li>";
		}


		if($page_no<$pages){
		echo "<li><a href=\"#\" onclick=\"page('cell_board.php','page_cell','content',$page_no+1);\" >Next</a></li>";
		}
		
		
		?>
       
      </ul>
</center> 