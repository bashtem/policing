<?php
session_start();
include ("../session.php");





$password = md5($_GET['profile']);

if($password==$pass){




?>
		<script>

                    		document.getElementById("passport").innerHTML ="<div><form id='profileimage' method='POST' action='' enctype='multipart/form-data' ><img id='ipopassport' style=' width:250px; height:250px' src=<?php echo "../$passport"?> ><p id='message'></p><br><br><input id='profilepassport' name='profilepassport' required type='file' class='btn btn-warning form-control'/><br><input type='submit' id='profileupload' value='Update Passport' name='profileupload' class='btn btn-success form-control'></form></div>";

        </script>

                            <form action="" class="form-horizontal" method="post">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="<?php echo $fname ?>" name="fname" placeholder="First Name" readonly required maxlength="20"/>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="<?php echo $lname ?>" name="lname" placeholder="Last Name" readonly required maxlength="20"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" value="<?php echo $email ?>" name="email" placeholder="E-mail"  required maxlength="80"/>
                                    </div>
                                </div>

                                               
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="<?php echo $force_id ?>" name="force_no" placeholder="FORCE Number" readonly required maxlength="20"/>
                                    </div>
                                </div>      
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="npass" placeholder="New Password" required minlength="7"/>
                                    </div>
                                </div>                        
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="<?php echo $division ?>" name="division" placeholder="Division" readonly required maxlength="20"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="<?php echo $section ?>" name="section" placeholder="Section" readonly required maxlength="20"/>
                                    </div>
                                </div>             
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="state" value="<?php echo $state ?>" placeholder="State of Origin" readonly required maxlength="20"/>
                                    </div>
                                </div>       
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="mobile" value="<?php echo $mobile ?>" placeholder="Mobile no."  required maxlength="11"/>
                                    </div>
                                </div>             

                                <div class="form-group push-up-30">
                                    <div class="col-md-6">
                                         <input type="hidden" name="submitted" value="TRUE"/>
                                        <a href="#" class="btn btn-link btn-block"></a> 
                                   </div>
                                    <div class="col-md-6">
                                         <input type="submit" name="profileupdate" class="btn btn-danger btn-block" value="UPDATE">
                                    </div>
                                </div>
                                
                            </form>                            
                            
                        </div> 
          
   <script>

  function readURL(input) {

				var file = input.files[0];
				var imagefile = file.type;
				var match= ["image/jpeg","image/png","image/jpg"];
				if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
				{
					$('#ipopassport').attr('src','../suspect/mpolice.jpg');
					return false;
				}else{
					//alert(imagefile);

				    if (input.files && input.files[0]) {

				        var reader = new FileReader();
				        reader.onload = function (e) {
				            $('#ipopassport').attr('src', e.target.result);
				        }

				        reader.readAsDataURL(input.files[0]);

				    }
				}}
             

  	$("#profilepassport").change(function(){
      var affirm = confirm("Do you want to update?");
         if(affirm){
         	document.getElementById('message').innerHTML="";
    readURL(this);
}});


$(document).ready(function (e) {
$("#profileimage").on('submit',(function(e) {
e.preventDefault();
//$("#message").empty();
//$('#loading').show();
$.ajax({
url: "profilepassport.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//$('#loading').hide();
$("#message").html("*** Passport Updated ! ***");
}
});
}));
});


  


  </script>          
                    
    <?php                    

}else{

?>
	<div style="text-align: center; margin-top: 60px; letter-spacing: 10px; color: #B22222"><h2> ACCESS</h2><h3> DENIED</h3><span style="font-size: 40px" class="glyphicon glyphicon-ban-circle"></span></div>

<?php
}

?>


