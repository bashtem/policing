
<?php

session_start();
include ("../session.php");

include("../pagination.php");
page($dbconnect,'news','','','10','page_news','time');
$pages=$_SESSION['pages'];
$page_no= $_SESSION['$page_no'];
$query = $_SESSION['query'];

?>

<div class='jumbotron' id='news'>
<a href='#' style='float:right' onclick='updatenews()' class='btn btn-info'>Update</a>
<h2 style='color:#980000 '><span style="color:#505050" class="glyphicon glyphicon-flag"></span> NEWS</h2>
<hr>

<?php

/*$sql ="SELECT * FROM news order by time desc LIMIT 0, 15";
$query=mysqli_query($dbconnect,$sql);*/

while($row=mysqli_fetch_array($query)){
	$time = $row['time'];

echo "<marquee direction='left' onmouseout='start()' onmouseover='stop()'>  <a  onclick='news_view($time)'  style='text-decoration:none' href='#'> ". $row['information'] ."</a></marquee><br>";
//echo	$row['subject'];
}


?>


</div>
<center>
	<ul  class="pagination pagination-sm">
        
        <?php
		if($page_no>1){
			
		echo	"
        <li><a href=\"#\" onclick=\"page('news.php','page_news','content', $page_no-1);\"  >Previous</a></li>";		
		}
		

		for($x=1;$x<=$pages;$x++){
		echo ($page_no==$x)? "<li><a href='#' onclick=\"page('news.php','page_news','content','$x');\"  ><b style=\"color:red\">$x</b></a></li>" : "<li><a href='#' onclick=\"page('news.php','page_news','content','$x');\" >$x</a></li>";
		}


		if($page_no<$pages){
		echo "<li><a href=\"#\" onclick=\"page('news.php','page_news','content',$page_no+1);\" >Next</a></li>";
		}
		
		
		?>
       
      </ul>
</center> 