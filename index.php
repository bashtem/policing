
<?php

session_start();
include ("dbconnect.php");

if(isset($_SESSION['force_id'])){

  header("Location:portal/");
}


  $login="";
  $newuser ="";

if(isset($_POST['login'])){

  $force_id=$_POST['force_id'];
  $pass= md5($_POST['password']);
  $query = "select * from ipo where force_id='$force_id' AND password='$pass' ";
  $dbquery = mysqli_query($dbconnect,$query);
  $row=mysqli_fetch_array($dbquery);

  if(mysqli_num_rows($dbquery)==0){
    

      if(  $pass == md5("admin")  ){
                                $dbqueryempty = mysqli_query($dbconnect,"select * from ipo");
                                if(mysqli_num_rows($dbqueryempty)==0){

                                  $newuser = "admin";
                                }else{

                                      $login="no";
                                }
                    
              }else{

               $passnew= $_POST['password'];

              $querynew = "select * from ipo where force_id='$force_id' AND password='$passnew' ";

              $dbquerynew = mysqli_query($dbconnect,$querynew);


        if(mysqli_num_rows($dbquerynew)==1){

            
                    $row=mysqli_fetch_array($dbquerynew);

                   if( ($row['active']==0) && ($row['section']=="") ){

                              $newuser = "ipo";

                     }elseif ( ($row['active']==1) && ($row['section']=="") ){
                   
                              $newuser= "ipo";
                      
                     }else{
                        
                              $login="no";
                              } 
        }else{

                   $login="no";
                                      }

                        }
}elseif( (mysqli_num_rows($dbquery)==1) && ($row['active']==1) ){

      //  SAVE LOGIN HISTORY TO DATABASE
  
        $time = date("h:i:s");
        $date = date("Y/M/D")." ".date("y/m/d");
        $sqlhistory ="INSERT INTO log_in(login_date,login_time,force_id) VALUES('$date','$time','$force_id')";
        $queryhistory = mysqli_query($dbconnect, $sqlhistory);
        if($queryhistory){
            $login="yes";
                      $newuser= "exist";
        }else{
          echo "
          <script>
                alert('DB Error');
          </script>";
        }

                  
                }
elseif( (mysqli_num_rows($dbquery)==1) && ($row['active']==0) ){

                  $login="disabled";
                }


    
}




if(isset($_POST['profilesubmit'])) {

   $dbqueryempty = mysqli_query($dbconnect,"select * from ipo");   

    if(mysqli_num_rows($dbqueryempty)==0){


       if(isset($_FILES["profilepassbtn"]["tmp_name"])){
      
                $type = $_FILES['profilepassbtn']['type'];
                        
                    if ( ($type == "image/png") || ($type== "image/jpg") || ($type== "image/jpeg")  ) {

                $sourcePath = $_FILES['profilepassbtn']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "profile/".$_FILES['profilepassbtn']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

         
          }elseif($type==""){
                   echo "<script>alert('No image');
                          
                      </script>";

          }else{

                 echo "<script>alert('***Invalid Image Type***');
                          window.location.assign('./');
                      </script>";
                  exit();
       }}
        

        if(($_FILES['profilepassbtn']['name']=="") && $_POST['sex']=="M"){

            $targetPath = "profile/mpolice.jpg";

}elseif(($_FILES['profilepassbtn']['name']=="") && $_POST['sex']=="F"){
                $targetPath = "profile/fpolice.png";
}else{
           $targetPath = "profile/".$_FILES['profilepassbtn']['name'];
}
    
   

    $fname= $_POST['fname'];
    $lname=$_POST['lname'];
    $force_id = $_POST['force_id'];
    $sex=$_POST['sex'];
    $email=$_POST['email'];
    $npass=md5($_POST['npass']);
    $division=$_POST['division'];
    $section=$_POST['section'];
    $state=$_POST['state'];
    $mobile=$_POST['mobile'];
    $profilepix = $targetPath;
    $active ='1';
    $level='1';
    


//,sex,email,password,division,section,state,telephone,passport,active,level,force_id
    //,'$sex','$email','$npass','$division','$section','$state','$mobile','$profilepix','$active','$level','$force_id'


    $sqltext = "INSERT INTO ipo(fname,lname,force_id,sex,email,password,division,section,state,telephone,passport,active,level) values('$fname','$lname','$force_id','$sex','$email','$npass','$division','$section','$state','$mobile','$profilepix','$active','$level')";
    $queryprofile = mysqli_query($dbconnect,$sqltext);

              if($queryprofile){

                                            echo "<script>alert('Profile Updated')</script>";
    
                              }else{

                                            echo "<script>alert('Update Failed contact your Admin...')</script>";
                            
                             }
  

       }else{

                        if(isset($_FILES["profilepassbtn"]["tmp_name"])){
      
                $type = $_FILES['profilepassbtn']['type'];
                        
                    if ( ($type == "image/png") || ($type== "image/jpg") || ($type== "image/jpeg")  ) {

                $sourcePath = $_FILES['profilepassbtn']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "profile/".$_FILES['profilepassbtn']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

         
          }elseif($type==""){
                   echo "<script>alert('No image');
                          
                      </script>";

          }else{

                 echo "<script>alert('***Invalid Image Type***');
                          window.location.assign('./');
                      </script>";
                  exit();
       }}
        

        if(($_FILES['profilepassbtn']['name']=="") && $_POST['sex']=="M"){

            $targetPath = "profile/mpolice.jpg";

}elseif(($_FILES['profilepassbtn']['name']=="") && $_POST['sex']=="F"){
                $targetPath = "profile/fpolice.png";
}else{
           $targetPath = "profile/".$_FILES['profilepassbtn']['name'];
}
    
   

    $fname= $_POST['fname'];
    $lname=$_POST['lname'];
    $force_id = $_POST['force_id'];
    $sex=$_POST['sex'];
    $email=$_POST['email'];
    $npass=md5($_POST['npass']);
    $division=$_POST['division'];
    $section=$_POST['section'];
    $state=$_POST['state'];
    $mobile=$_POST['mobile'];
    $profilepix = $targetPath;
    
    


//,sex,email,password,division,section,state,telephone,passport,active,level,force_id
    //,'$sex','$email','$npass','$division','$section','$state','$mobile','$profilepix','$active','$level','$force_id'


 $sqltext = "UPDATE ipo SET  fname='$fname', lname='$lname', force_id='$force_id', sex='$sex', email='$email', password='$npass', division='$division' , section='$section', state='$state', telephone='$mobile', passport='$profilepix' WHERE force_id='$force_id'";

    $queryprofile = mysqli_query($dbconnect,$sqltext);

              if($queryprofile){

                                            echo "<script>alert('Profile Updated')</script>";
    
                              }else{

                                            echo "<script>alert('Update Failed contact your D.P.O...')</script>";
                            
                             }


            
                    

                         //    echo "<script>alert('LALALALALALa')</script>";
                   }
  

}



?>



<!DOCTYPE html>
<html lang="en">



<head>
  <title>URBAN POLICING</title>
  <link rel="icon" href="img/pol.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/inside.css">


  <?php

include("modal.php");
include("modalnew.php");

?> 

  <style>
    
    td,p,h2{
font-family: monospace;
color:white;
 }
   
  </style>


</head>



<body style="background-image:url('img/1.jpg'); background-attachment: fixed">






<!-- MODAL FOR LOGIN -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
    <div id="modal-body" class="modal-body">
      <p id="notify" style="font-size: 50px">  </p>

    </div>

    <div id='foot'>
      <div  id='footcolor' role="progressbar" style= 'color:white; font-family: monospace'> </div>
    </div>
    
  </div>

</div>


<!-- MODAL FOR NEW IPO -->

<div id="newModal" class="newmodal">

  <!-- Modal content -->
  <div class="newmodal-content">
    <span id="newclose" class="newclose">x</span><br>
    
<p class="text-center" style="font-family: monospace; color:#B2B2FF"><h3>Profile Update...</h3></p>
<form action="" class="form-horizontal" method="post" onsubmit='return val()' name="profileupdate" enctype="multipart/form-data">
                                <div class="form-group text-center">
                                    <div class="col-md-12">
                                       <img id="profilepassport" style=" width:250px; height:250px" src="suspect/gender.png" ><br>
                                        <div id='profilemessage' ></div><br>
                                      <input id="profilepassbtn"  class="btn btn-warning form-control" type="file"  name="profilepassbtn" ><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" required maxlength="20"/>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required maxlength="20"/>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="number" class="form-control"  name="force_id" placeholder="FORCE ID" required maxlength="6"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-md-6 text-center">
                                        <label>Male: </label> <input  id="male" type="radio" name="sex" value="M" required/>
                                   </div>
                                    <div class="col-md-6 text-center">
                                        <label>Female: </label> <input id="female" type="radio" name="sex" value="F" required />
                                   </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" placeholder="E-mail"  required maxlength="80"/>
                                    </div>
                                </div>
     
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="npass" id="password" placeholder="Password" required maxlength="20"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="npass" id="confirm_password" placeholder="Confirm Password" onkeyup="passmatch();" required maxlength="20"/><span id="glypass"></span>
                                        <span id="glypass"></span>
                                    </div>
                                </div>   

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="division" placeholder="Division" required maxlength="20"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select name="section" required class="form-control">
                                          <option value="">-Crime Section-</option>
                                          <option value="Anti Robbery">Anti Robbery</option>
                                          <option value="Anti Crime Patrol">Anti Crime Patrol</option>
                                          <option value="D.C.B">D.C.B</option>
                                          <option value="Homicide">Homicide</option>
                                          <option value="Human Right">Human Right</option>
                                          <option value="J.W.C">J.W.C</option>
                                          <option value="Respond Monitor">Respond Monitor</option>
                                          <option value="Surveillance">Surveillance</option>
                                          
                                       </select>
                                    </div>
                                </div>             
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <select name="state" id="state" class="form-control">
              <option value="" selected="selected">-State of Origin -</option>
              <option value="Abuja FCT">Abuja FCT</option>
              <option value="Abia">Abia</option>
              <option value="Adamawa">Adamawa</option>
              <option value="Akwa Ibom">Akwa Ibom</option>
              <option value="Anambra">Anambra</option>
              <option value="Bauchi">Bauchi</option>
              <option value="Bayelsa">Bayelsa</option>
              <option value="Benue">Benue</option>
              <option value="Borno">Borno</option>
              <option value="Cross River">Cross River</option>
              <option value="Delta">Delta</option>
              <option value="Ebonyi">Ebonyi</option>
              <option value="Edo">Edo</option>
              <option value="Ekiti">Ekiti</option>
              <option value="Enugu">Enugu</option>
              <option value="Gombe">Gombe</option>
              <option value="Imo">Imo</option>
              <option value="Jigawa">Jigawa</option>
              <option value="Kaduna">Kaduna</option>
              <option value="Kano">Kano</option>
              <option value="Katsina">Katsina</option>
              <option value="Kebbi">Kebbi</option>
              <option value="Kogi">Kogi</option>
              <option value="Kwara">Kwara</option>
              <option value="Lagos">Lagos</option>
              <option value="Nassarawa">Nassarawa</option>
              <option value="Niger">Niger</option>
              <option value="Ogun">Ogun</option>
              <option value="Ondo">Ondo</option>
              <option value="Osun">Osun</option>
              <option value="Oyo">Oyo</option>
              <option value="Plateau">Plateau</option>
              <option value="Rivers">Rivers</option>
              <option value="Sokoto">Sokoto</option>
              <option value="Taraba">Taraba</option>
              <option value="Yobe">Yobe</option>
              <option value="Zamfara">Zamfara</option>
              <option value="Outside Nigeria">Outside Nigeria</option>
            </select>

                                    </div>
                                </div>       
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="number" class="form-control" name="mobile" placeholder="Mobile No."  required maxlength="11"/>
                                    </div>
                                </div>             

                                <div class="form-group push-up-30">
                                    <div class="col-md-6">
                                         <input type="hidden" name="submitted" value="TRUE"/>
                                        <a href="#" class="btn btn-link btn-block"></a> 
                                   </div>
                                    <div class="col-md-6">
                                        <input type="submit" name="profilesubmit" class="btn btn-danger btn-block" value="UPDATE">
                                    </div>
                                </div>
                                
</form>                            
                            
                        </div> 


  </div>

</div>




<!-- <script>

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>
 -->

 

<div class="container">
  
  <div  >
    <p class="text-center" ><img  style="height: 220px; " src="img/logo.png"></p>
    <p ><h5 class="text-center" style="color:red; font-family: lucida console; letter-spacing: 20px; margin-top: 25px">URBAN POLICE DATABASE</h5></p>
  
    <form method="POST" class="form-signin">
      <table cellpadding="10px">
        <tr>         <td>FORCE ID   :</td>&nbsp;<td> <input required maxlength='6'  type="number" class="form-control" placeholder="FORCE NUMBER" name="force_id" id="force_id"></td>     </tr>
        <tr>         <td>PASSWORD   :</td>&nbsp; <td><input required type="password" class="form-control" placeholder="********" name="password"></td>    </tr>
        <tr>            <td></td>  <td><input  type="submit" class="btn btn-success" name="login"  value="Login"> </td>   </tr>
      </table>

    </form>
    


    </div><br><br>
  
<div class="text-center" id="bottom">
    <h6><p>You are entering in a secured Federal Republic of Nigeria system, which may be used only for authorized purposes.</p></h6>
    <h6><p>Modification of any information on this system is subject to a criminal prosecution. The agency monitors all usuage of this system.</h6></p> 
    <h6><p>All persons are hereby notified that use of this system constitutes consent to such monitoring and audition. </p></h6>
    <h6><p>&copy; <?php echo date("Y").".";

    ?></p></h6>

  </div>
  
    </div>

    </body>

 <?php


if($login=="yes" && $newuser=="exist"){
  

  $_SESSION['force_id'] = $row['force_id'];
echo" 
<script> 
var access= document.getElementById('notify');
var foot = document.getElementById('foot');
var footcolor = document.getElementById('footcolor');
var modal = document.getElementById('myModal');

  access.style.color='green';
  access.style.textAlign='center';

    //foot.className='modalfooter';
    foot.className='progress';
    footcolor.className='progress-bar';
    
    /*footcolor.style.width='1%';
    footcolor.style.backgroundColor='#5cb85c';*/
    footcolor.innerHTML='Loading...';

  access.innerHTML='<b>ACCESS GRANTED !</b>';
         modal.style.display = 'block';
         
      function progress(){
    
      var footcolor = document.getElementById('footcolor');
      var width=1;
      var id = setInterval(login,80);

      function login(){
      if(width>=100){
          clearInterval(id);
          window.location.assign('portal/');
      }else{
        width++;
        footcolor.style.width= width +'%';
        

         }                                        
      
      }
    }

    progress();



 </script>";

// echo "exits";



 }else if($login=="no"){

echo "
<script> 
var access= document.getElementById('notify');
  var modal = document.getElementById('myModal');
  access.style.color='red';
  access.style.textAlign='center';
  access.innerHTML='<b>ACCESS DENIED !</b>';
         modal.style.display = 'block';
         
      function login(){
        window.location.assign('./');

         }

setTimeout(login,5000);

  </script>";

  }elseif($login=="disabled"){
    echo "
<script> 
var access= document.getElementById('notify');
  var modal = document.getElementById('myModal');
  access.style.color='red';
  access.style.textAlign='center';
  access.innerHTML='<b>ACCOUNT DISABLED !</b>';
         modal.style.display = 'block';
         
      function login(){
        window.location.assign('./');

         }

setTimeout(login,5000);

  </script>";

  }

if($newuser=="admin"){

      echo "
            <script>
               var newmodal =document.getElementById('newModal');
               newmodal.style.display='block';

var newspan = document.getElementById('newclose');

        newspan.onclick = function() {
                  
                    var exitconf = confirm('Do you want to close?')
                    if(exitconf){
                      newmodal.style.display = 'none';
                      window.location.assign('./');
                    }
                }
                
               // alert('helo');
            </script>


      ";


}elseif($newuser =="ipo"){

    echo "
            <script>
               var newmodal =document.getElementById('newModal');
               newmodal.style.display='block';

var newspan = document.getElementById('newclose');

        newspan.onclick = function() {
                  
                    var exitconf = confirm('Do you want to close?')
                    if(exitconf){
                      newmodal.style.display = 'none';
                      window.location.assign('./');
                    }
                }
                
               // alert('helo');
            </script>


      ";
}




?>


  </html>
<script src="js/ajaxCode.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
        function passmatch(){
  var pass=document.getElementById('password').value;
  var cpass=document.getElementById('confirm_password').value;
  if (pass==cpass){
    document.getElementById('glypass').innerHTML="<span style='color:green; font-size:20px' class='glyphicon glyphicon-ok-circle'>Matched</span>";
        }
  else{
    document.getElementById('glypass').innerHTML="<span style='color:red; font-size:20px' class='glyphicon glyphicon-remove-circle'>Mismatched</span>";
}   }


function val(){
  var check = confirm("Do you want to Submit ?");
  if(check){

  if(profileupdate.password.value!=profileupdate.confirm_password.value){
    alert("Password Confirmation does not Match");
    return false;     
  }else if(profileupdate.password.value.length<6){
            alert("Password too short");
    return false;
    }

}else{
          return false;
      }
    }

function readURL(input) {

var file = input.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
  $('#profilepassport').attr('src','suspect/gender.png');
  return false;
}else{

  //alert(imagefile);

    if (input.files && input.files[0]) {

        var reader = new FileReader();
        reader.onload = function (e) {
            $('#profilepassport').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);

    }
}}


$("#profilepassbtn").change(function(){
    readURL(this);

   /*var dis = this.files[0].type;
   alert(dis);*/
});


  var female = document.getElementById("female");
  var male = document.getElementById("male");

female.onclick = function(){
  var passbtn =document.getElementById("profilepassbtn").value;
  if(passbtn==""){
  document.getElementById("profilepassport").src="profile/fpolice.png";
}
  //alert("hi");
}

male.onclick = function(){
  var passbtn =document.getElementById("profilepassbtn").value;
  if(passbtn==""){
 document.getElementById("profilepassport").src="profile/mpolice.jpg";
}
 //alert("ho");
}

  </script>
