<?php
session_start();
include("dbconnect.php");

?>

<script>
var out= confirm("Are you sure you want to Logout?");
if(out){
	
window.location.assign('exit_logout.php');

}else{
window.location.assign('portal/');	
}
</script>

