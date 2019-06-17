<?php
session_start();
include ("../session.php");


?>


<div   id="new">
		
						<form id="pm" method="POST"  >
							<p style="color:green; font-size: 20px; letter-spacing: 10px; text-align:center; ">New Message</p><hr>
							 <h6 id="checkid" style="font-size: 13px; letter-spacing: 5px; text-align: center; font-style: italic;"></h6>
							<hr>
							<input type="number" id="receiver_id" name="receiver_id" onclick="checkid" onblur="checkforce();" required placeholder="Send To force id" class="form-control" >
								<input type="text" id="subjectpm" name="subjectpm" required placeholder="Subject" class="form-control" >
								
								<textarea class="form-control" maxlength="500" name="pmmsg" required id="pmmsg" rows="8"></textarea><hr>
							
							<input type="submit" class="form-control btn btn-success " name="subpm" value="Send">
						</form>
	
		</div>


<script type="text/javascript">
	var inputid=document.getElementById('receiver_id');
	inputid.onclick = function(){

		document.getElementById('checkid').innerHTML= "";
	}




</script>