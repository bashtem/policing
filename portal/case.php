<?php
session_start();
include ("../session.php");

include("../pagination.php");
page($dbconnect,'plain','','','10','page_case','time_detained','case');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];


?>




<div>
		<p style="color:#880000 ; font-size:20px; text-align: center; letter-spacing: 10px; float: left">CASE FILE</p>

		 	<div style="margin-left:600px">

		 			<span><input style="width:80%; border-radius: 8px" tabindex="201" class="form-control-static" name="search_case" id="search_case" type="text" placeholder=" search by name"><a href="#" onclick="page('search_case.php','search_case_file','case_content','search_case')" style=" padding-left: 10px; display: inline-block;" href=""><span class="glyphicon glyphicon-search"></span></a></span>
		 			
			 </div>
</div> 
 
 <hr/>

<div id="case_content">
<div id="case_body">

	<table class="table table-striped table-hover ">
		<tr style="background-color: #4D4D4D; color:white ; text-align: center">
		<td>ID</td>
		<td style="background-color: #4D924D">TITLE</td>
		<td>DATE</td>
		<td>I.P.O</td>
		<td style="background-color: 	#349BFF">PLAIN </td>
		<td style="background-color: #FF3333">CAUTION </td>
		<td>OPERATION</td>
		<td style=''>REMARK</td>
		<td style='background-color:#CCAC00; color:black'>HISTORY</td>
		</tr>

<?php

			/*$sqlstate1="SELECT plain_form.fname, plain_form.lname, plain_form.sex, plain_form.age, plain_form.occupation, caution_form.fname, caution_form.lname, caution_form.sex, caution_form.age, caution_form.occupation, caution_form.remark, caution_form.force_id, caution_form.date, caution_form.time  FROM plain_form,caution_form where plain_form.time=caution_form.time order by caution_form.time desc";
			$query = mysqli_query($dbconnect,$sqlstate1);*/


if($query){

	//echo "success<br>";
	$no = 1;
	while($rows=mysqli_fetch_array($query)){


?>
		 <tr style="text-align: center">
		<td><?php echo $no ;?></td>
		<td style='color:red; font-weight: bold;'><?php echo strtoupper($rows[0]." / ".$rows[1]) ;?></td>
		<td ><?php echo substr($rows[3],0,8) ?></td>
		<td style='color:red; font-weight: bold;'><a href="#"><?php echo $rows[2]?></a></td>
		<td><a  style="text-decoration: none"  href="#" onclick=<?php echo "plain_view(".$rows[4].")" ?> >VIEW <span class="	glyphicon glyphicon-eye-open"></span></a></td>
		<td><a  style="text-decoration: none" href="#" onclick=<?php echo "caution_view(".$rows[4].")" ?> >VIEW <span class="	glyphicon glyphicon-eye-open"></span></a></td>
		<td style='color:#000080; font-weight: bold'><a id="<?php echo 'treatmode'.$no?>" onclick=<?php echo "treat(".$rows[4].")" ?>  href="#"> TREAT <span class="glyphicon glyphicon-flash"></span></a></td>
		<td style='font-weight: bold'><?php echo strtoupper($rows[5])?></td>
		<td><a style="text-decoration: none"  href="#" onclick=<?php echo "history_view(".$rows[4].")" ?> >SHOW <span class="	glyphicon glyphicon-eye-open"></span></a></td>
		</tr> 

<?php

				/*echo $rows[0]."   ".$rows[1]."<br>";
				echo $rows[2]."   ".$rows[3]."<br>";
				echo $rows[4];*/
				
				$no+=1;
			}

}else{

	echo "error";
}

?>

	</table>
</div>
			

<center>
	<ul  class="pagination pagination-sm">
        
        <?php
		if($page_no>1){
			
		echo	"
        <li><a href=\"#\" onclick=\"page('case.php','page_case','content', $page_no-1);\"  >Previous</a></li>";		
		}
		

		for($x=1;$x<=$pages;$x++){
		echo ($page_no==$x)? "<li><a href='#' onclick=\"page('case.php','page_case','content','$x');\"  ><b style=\"color:red\">$x</b></a></li>" : "<li><a href='#' onclick=\"page('case.php','page_case','content','$x');\" >$x</a></li>";
		}


		if($page_no<$pages){
		echo "<li><a href=\"#\" onclick=\"page('case.php','page_case','content',$page_no+1);\" >Next</a></li>";
		}
		
		
		?>
       
      </ul>
</center> 
</div>