<?php

function page($DB,$table, $column, $key, $per_page, $url, $order_by,$newquery=""){

if(($column==null) && ($key==null)){
	$sql_count="SELECT * FROM $table ";
}else{
	$sql_count="SELECT * FROM $table WHERE $column='$key'";
}
if($newquery=='case'){
		$sql_count="SELECT plain_form.fname, plain_form.lname, plain_form.sex, plain_form.age, plain_form.occupation, caution_form.fname, caution_form.lname, caution_form.sex, caution_form.age, caution_form.occupation, caution_form.remark, caution_form.force_id, caution_form.date, caution_form.time  FROM plain_form,caution_form where plain_form.time=caution_form.time order by caution_form.time ";
	}

$result = mysqli_query($DB,$sql_count);
$_SESSION['pages']= ceil(mysqli_num_rows($result)/$per_page);
$_SESSION['$page_no']= isset($_GET[$url])? (int)$_GET[$url] : 1;
$page_no = isset($_GET[$url])? (int)$_GET[$url] : 1;
$start = ($page_no-1)*$per_page;
	

	if(($column==null) && ($key==null)){
			$sql="SELECT * FROM $table  ORDER BY $order_by DESC LIMIT $start,$per_page ";
	}else{
			$sql="SELECT * FROM $table  WHERE $column='$key' ORDER BY $order_by DESC LIMIT $start,$per_page ";
	}


	if($newquery=='cell'){
		$sql = "SELECT caution_form.lname, caution_form.fname, caution_form.sex, caution_form.offence, caution_form.force_id, caution_form.remark, caution_form.time, ipo.section, cell_board.date_detained, cell_board.time_detained  FROM caution_form,ipo,cell_board where caution_form.time=cell_board.caution_time AND caution_form.force_id=ipo.force_id AND cell_board.detention='detained' order by cell_board.time_detained DESC LIMIT $start,$per_page" ;
		
	}
	if($newquery=='case'){
		$sql="SELECT plain_form.fname, caution_form.fname, caution_form.force_id, caution_form.date, caution_form.time, caution_form.remark  FROM plain_form,caution_form where plain_form.time=caution_form.time order by caution_form.time DESC LIMIT $start,$per_page";
	}
	if($newquery=='sec'){

		$sql = "SELECT * FROM ipo WHERE section LIKE '%$key%' order by fname DESC LIMIT $start,$per_page";
	}


$query = mysqli_query($DB, $sql);
$_SESSION['query']= $query;

}


?>

