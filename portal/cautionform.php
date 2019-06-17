

<div class="sidenav" id="cautionform">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav('cautionform')">X</a>  
          <div class="form-group" style="background-color: #C0C0C0; width:900px; height:730px; margin:auto"><br>
                <p style="text-align: center; font-size: 30px; color: #880000 ">Caution Form</p><hr>
                    <div class="col-md-12" >            
                        INTERPRETER:
                        <input required class="form-control" id="interpreter" type="text" name="interpreter" > 
                        RECORDER: <input required class="form-control" id="recorder" type="text" name="recorder" >
                        DATE:<input required class="form-control" type="text" id="date" name="date" readonly value="<?php echo date("d/m/y")?>">
                        <p id="emptyspace"></p>
                       <textarea class="form-control" name="cautioncomments" required rows="18" id="cautioncomments" placeholder="Type your comments here..."></textarea>
                       <input type="submit" id="subcaution" class="btn btn-success form-control" name="subcaution" value="Submit" >
                       <!-- <button id="subcaution" type="submit" name="subcaution"  class="btn btn-success form-control" >Submit</button> -->
                   </div>  
          </div>
</div>



<script type="text/javascript">
  
   function subcau(){

         var confir=confirm("Do you want to proceed?");
    if(confir){

                if(document.getElementById("cautioncomments").value.length<=2){

                  alert("Comment too short !");
                  return false;
                }else{
                            alert("Submitted!");
                        }
                    } 

         
        }


</script>