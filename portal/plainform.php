

<div class="sidenav" id="plainform">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav('plainform')">X</a>
	
        <div class="form-group" style="background-color: #C0C0C0; width:900px; height:730px; margin:auto"><br>
        	   <p style="text-align: center; font-size: 30px; color: #880000 ">Plain Form</p><hr>
                <div class="col-md-12" >                  
                  	INTERPRETER:<input required class="form-control" id="interpreter" type="text" name="interpreter" > 
                    RECORDER: <input required class="form-control" id="recorder" type="text" name="recorder" >
                  	DATE:<input required class="form-control" type="text" id="date" name="date" readonly value="<?php echo date("d/m/y")?>">
                    <p id="emptyspace"></p>

                   <textarea class="form-control" name="plaincomments" required rows="18" id="plaincomments" placeholder="Type your comments here..."></textarea>
                   <!-- <a href="#" name="subplain"  id="subplain" class=" btn btn-success">Proceed to Caution Form</a> -->
                   <input type="submit" id="subplain" class="btn btn-success form-control" name="subplain" value="Submit" >
               </div>        	
        </div>

</div>



<script type="text/javascript">
	
	//var subplain = document.getElementById("subplain");

	 function subform(){

				 var confir=confirm("Do you want to proceed?");
		if(confir){

          			if(document.getElementById("plaincomments").value.length<=2){

          				alert("Comment too short !");
                  return false;
          			}else{
                            alert("Submitted!");
                        }
                    } 

         
        }

</script>