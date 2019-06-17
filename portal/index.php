<?php

session_start();
include("../session.php");

if(!(isset($_SESSION['cauform']))){
$_SESSION['cauform']="";
//$_SESSION['cauform']="rat";
 //echo $_SESSION['cauform'];  
}





if(isset($_POST['subnews'])){

$date = date("d/m/y")." ".date("h:i:s");
$time = time();
$subject=strip_tags($_POST['subject']);
$info=strip_tags($_POST['newsinfo']);
$sql = "INSERT INTO news(subject,information,force_id,date,time) values('$subject','$info','$force_id','$date','$time')";
if($query=mysqli_query($dbconnect,$sql)){

  echo "<script> alert('News Updated')</script>";
} 
  }



if(isset($_POST['profileupdate'])){

    $email=$_POST['email'];
     $npass=md5($_POST['npass']);
     $mobile=$_POST['mobile'];

        $sql = "UPDATE ipo SET email='$email', password='$npass', telephone='$mobile' where force_id='$force_id'";
        $queryupdate =mysqli_query($dbconnect,$sql);
        if($queryupdate){

            echo "<script>alert('Profile Updated')</script";
        }else{
            echo "<script>alert('Update Failed')</script";
        

}
        }



if(isset($_POST['saveagent'])){


$agentforce = $_POST['agentforce'];
$agentpass = $_POST['agentpass'];
$rank = $_POST['rank'];

$sql = "SELECT * FROM ipo WHERE force_id = '$agentforce' ";


$queryipo = mysqli_query($dbconnect, $sql );
 $agents = base64_encode('agents');
 if(isset($_POST['admin'])){
        $level = 1;
 }else{
        $level = 0;
 }

  if(mysqli_num_rows($queryipo)==1){

       ;
        ?>
          <script>
          alert('Profile already exist!');
              window.location.assign(' <?php echo "./?agents=$agents" ?> ');
                
          </script>
         
<?php
  }elseif(mysqli_num_rows($queryipo)!=1){

    if(!(isset($_POST['agentactive']))){

          $agentactive=0;
          $sql = "INSERT INTO ipo(force_id,password,active,level,rank) values('$agentforce','$agentpass','$agentactive','$level',
          '$rank')";
        
                  if($agentinsert =mysqli_query($dbconnect,$sql)) {

                    ?>
                     <script> alert('Profile Created');
                         window.location.assign(' <?php echo "./?agents=$agents" ?> '); 
                       </script>

                     <?php  

                  }else{
                    ?>
                     <script>alert('Profile Creation Failed!');
                      window.location.assign(' <?php echo "./?agents=$agents" ?> ');
                      </script> 
                     <?php 
                  }

      }else{

          $agentactive=1;
          $sql = "INSERT INTO ipo(force_id,password,active,level,rank) values('$agentforce','$agentpass','$agentactive','$level',
          '$rank')";

                  if($agentinsert =mysqli_query($dbconnect,$sql)){
                    ?>
                     <script>
                     alert('Profile Created and Activated!');
                       window.location.assign(' <?php echo "./?agents=$agents" ?> ');
                      </script>
                  <?php

                  }else{
                      ?>
                      <script>alert('Profile Creation Failed!');
                                window.location.assign(' <?php echo "./?agents=$agents" ?> ');
                      </script> 
                      <?php
                  }

              }
    }else{

        echo "<script>alert('DB connection Failed!');
                      window.location.assign('./');
        </script>"; 
                }
                                  }

                                  
if(isset($_POST['update_agent_profile'])){

    $active = $_POST['active'];
    $force_id = $_POST['id'];
    $sql = "UPDATE ipo SET active='$active' WHERE force_id='$force_id'";
    if($query = mysqli_query($dbconnect,$sql)){
        echo "<script> alert('PROFILE UPDATED!'); window.location.assign('?ab23fd530k=u_a_p');
        </script>";
    }else{
        echo "<script> alert('UPDATE FAILED'); window.location.assign('?ab23fd530k=u_a_p');
        </script>";
    }
    

  
}



if(isset($_POST['subplain'])){

     
      //echo date("d/m/y / h:i:m");
      

          if(isset($_FILES["passbtn"]["tmp_name"])){
      
                $type = $_FILES['passbtn']['type'];
                        
                    if ( ($type == "image/png") || ($type== "image/jpg") || ($type== "image/jpeg")  ) {

                $sourcePath = $_FILES['passbtn']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "../suspect/".$_FILES['passbtn']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

         
          }elseif($type==""){
                   
                      $targetPath="";
          }
                }else{

                          $targetPath="";
                }

      if(isset($_POST['email'])){

              $email= $_POST['email'];
      }          

$time = time();
$station= $_POST['station'];
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$sex= $_POST['sex'];
$age= $_POST['age'];
$occupation= $_POST['occupation'];
$religion= $_POST['religion'];
$nation= $_POST['nation'];
$address= $_POST['address'];
$telephone= $_POST['telephone'];
$command= $_POST['command'];
$interpreter= $_POST['interpreter'];
$recorder= $_POST['recorder'];
$date= date("d/m/y / h:i:m");
$plaincomments= $_POST['plaincomments'];

$national_id=$_POST['national_id'];
$driver_lincense=$_POST['driver_lincense'];
$int_passport=$_POST['international_passport'];
$lasra_id=$_POST['lasra_id'];

$sql= "INSERT INTO plain_form(station,command,fname,lname,sex,age,occupation,religion,nation,address,telephone,email,force_id,interpreter,recorder,date,time, comments,passport,national_id,driver_lincense,int_passport,lasra_id) values('$station','$command','$fname','$lname','$sex','$age','$occupation','$religion','$nation','$address',
'$telephone','$email','$force_id','$interpreter','$recorder','$date','$time','$plaincomments','$targetPath','$national_id',          '$driver_lincense','$int_passport','$lasra_id')";

$query = mysqli_query($dbconnect,$sql);
if (mysqli_affected_rows($dbconnect)){

    $caution=base64_encode("cautionform");
    $count=time()+3;
    $setcount= base64_encode($count);
    $_SESSION['cauform']= $time;

        ?>
        <script type="text/javascript">
          window.location.assign('<?php echo "./?XninjvhHFHUJDScsakhcv=$caution&TnUoC=$setcount" ?>');
        </script>
        <?php

      }
                                        }



if(isset($_POST['subcaution'])){

        //echo "caution submitted";

        if(isset($_FILES["passbtn"]["tmp_name"])){
      
                $type = $_FILES['passbtn']['type'];
                        
                    if ( ($type == "image/png") || ($type== "image/jpg") || ($type== "image/jpeg")  ) {

                $sourcePath = $_FILES['passbtn']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "../suspect/".$_FILES['passbtn']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

         
          }elseif($type==""){
                   
                      $targetPath="";
          }
                }else{

                          $targetPath="";
                }

          if(isset($_POST['email'])){

              $email= $_POST['email'];
      }  

$timecau = $_SESSION['cauform'];
$station= $_POST['station'];
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$sex= $_POST['sex'];
$age= $_POST['age'];
$occupation= $_POST['occupation'];
$religion= $_POST['religion'];
$nation= $_POST['nation'];
$address= $_POST['address'];
$telephone= $_POST['telephone'];
$email= $_POST['email'];
$command= $_POST['command'];
$interpreter= $_POST['interpreter'];
$recorder= $_POST['recorder'];
$date= date("d/m/y / h:i:m");
$cautioncomments= $_POST['cautioncomments'];

$national_id=$_POST['national_id'];
$driver_lincense=$_POST['driver_lincense'];
$int_passport=$_POST['international_passport'];
$lasra_id=$_POST['lasra_id'];

$sql= "INSERT INTO caution_form(station,command,fname,lname,sex,age,occupation,religion,nation,address,telephone,email,force_id,interpreter,recorder,date,time, comments,passport,national_id,driver_lincense,int_passport,lasra_id) values('$station','$command','$fname','$lname','$sex','$age','$occupation','$religion','$nation','$address',
'$telephone','$email','$force_id','$interpreter','$recorder','$date','$timecau','$cautioncomments','$targetPath','$national_id',     '$driver_lincense','$int_passport','$lasra_id')";

$query = mysqli_query($dbconnect,$sql);
if (mysqli_affected_rows($dbconnect)){

    $_SESSION['cauform']="";
  ?>
        <script type="text/javascript">
                  alert("A CASE FILE CREATED!");
                  window.location.assign('./');
        </script>
        <?php

      }
          

}



if(isset($_POST['treat'])){

    //echo "<script> alert('hello world')</script>";

  $offence = $_POST['offence'];
  $remark = $_POST['remark'];
  $detain = $_POST['detain'];
  $caution_time = $_POST['cautime'];

  if($detain=="detained"){
              $date_detained = date("d/m/y h:i:m");
              $time_detained = time();
              $sql_cell = "SELECT * FROM cell_board where caution_time = '$caution_time'";
              $cell_result = mysqli_query($dbconnect,$sql_cell);

              if(!(mysqli_num_rows($cell_result)>=1)){

              $treatsql = "UPDATE caution_form SET offence='$offence', remark='$remark' WHERE time ='$caution_time'";
               $treatsql2 ="INSERT INTO cell_board(date_detained,time_detained,detention,offence,caution_time) VALUES('$date_detained',
                    '$time_detained','$detain','$offence','$caution_time') ";
              $querytreat=mysqli_query($dbconnect,$treatsql);
              $querytrea2=mysqli_query($dbconnect,$treatsql2);
                  if($querytreat && $querytrea2 ){
                     
                                    $notify_treat ="success";
                          }else{
                                    $notify_treat ="failure";
                          } 
                    

                     }else{

      $treatsql = "UPDATE caution_form SET offence='$offence', remark='$remark' WHERE time ='$caution_time'";
      $treatsql2 ="UPDATE cell_board SET offence='$offence', detention='$detain', date_detained='$date_detained', time_detained='$time_detained' where caution_time='$caution_time'";

                      $querytreat=mysqli_query($dbconnect,$treatsql);
                      $querytrea2=mysqli_query($dbconnect,$treatsql2);


                  if($querytreat && $querytrea2){

                        $notify_treat ="success";
                      }else{
                                    $notify_treat ="failure";
                          } 
                  }

  }elseif($detain=="released"){

              $date_released = date("d/m/y h:i:m");
              $time_released = time();
              $sql_cell = "SELECT * FROM cell_board where caution_time = '$caution_time'";
              $cell_result = mysqli_query($dbconnect,$sql_cell);

              if(!(mysqli_num_rows($cell_result)>=1)){

              $treatsql = "UPDATE caution_form SET offence='$offence', remark='$remark' WHERE time ='$caution_time'";
               $treatsql2 ="INSERT INTO cell_board(date_released,time_released,detention,offence,caution_time) VALUES('$date_released',
                    '$time_released','$detain','$offence','$caution_time') ";
              $querytreat=mysqli_query($dbconnect,$treatsql);
              $querytrea2=mysqli_query($dbconnect,$treatsql2);
                  if($querytreat && $querytrea2 ){
                     
                                    $notify_treat ="success";
                          }else{
                                    $notify_treat ="failure";
                          } 
                    

                     }else{

      $treatsql = "UPDATE caution_form SET offence='$offence', remark='$remark' WHERE time ='$caution_time'";
      $treatsql2 ="UPDATE cell_board SET offence='$offence', detention='$detain', date_released='$date_released', time_released='$time_released' WHERE caution_time='$caution_time'";

                      $querytreat=mysqli_query($dbconnect,$treatsql);
                      $querytrea2=mysqli_query($dbconnect,$treatsql2);


                  if($querytreat && $querytrea2){

                        $notify_treat ="success";
                      }else{
                                    $notify_treat ="failure";
                          } 
                  }
  }



      if($notify_treat=="success"){
        $treattime = time()+10;

        echo "<script>alert('CASE TREATED!');
                  window.location.assign('?case= $treattime');
            </script>";

      }else{

        echo "<script>alert('DB ERROR!');
             window.location.assign('?case= $treattime');
        </script>";

      }

}



if(isset($_POST['subpm'])){

$date = date("d/m/y")." ".date("h:i:s");
$time = time();
$receiver_id= $_POST['receiver_id'];
$sender_id= $force_id;
$subject_pm=strip_tags($_POST['subjectpm']);
$pmmsg=strip_tags($_POST['pmmsg']);

$sql = "INSERT INTO pm(sender_id,receiver_id,subject,message,date,time) values('$sender_id','$receiver_id','$subject_pm','$pmmsg',
'$date', '$time')";
      if($query=mysqli_query($dbconnect,$sql)){
        $time = base64_encode(time()+30);
            echo "<script> 
                alert('Message Sent');
                window.location.assign('./?sent=$time');
            </script>";
    }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
                    <title>URBAN POLICING</title>
                    <link rel="icon" href="../img/pol.ico">
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" href="../css/bootstrap.min.css">
                    <link rel="stylesheet" href="../css/inside.css">
                    <link rel="stylesheet" href="../css/w3.css">
                    <script src="../js/jquery-1.11.3.min.js"></script>
                    <script src="../js/bootstrap.min.js"></script>
                    <script src="../js/ajaxCode.js"></script>

 <?php

include("../modal.php");
include("../modalnew.php");

?> 


  <script>
function pmnotif(){

var xmlrobot = getXMLHttpRequest();
    var url="../portal/pm_proc.php?data=0";
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
              
    xmlrobot.onreadystatechange = function(){

          if(xmlrobot.readyState==4){

            if(xmlrobot.responseText==0){

              var notifpm= "";
            }else{
              notifpm=xmlrobot.responseText;
            }
                          document.getElementById("pmnotify1").innerHTML=notifpm;
                          document.getElementById("pmnotify2").innerHTML=notifpm;


           }else{

                 //document.getElementById("pmnotify2").innerHTML='<center><img  src="../img/loader.gif"></center>';

    }

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}


 function news(){
 var xmlrobot = new XMLHttpRequest();
 var url="../portal/news.php";
 
 if(xmlrobot==null){
    alert("Your browser does not support Ajax");
    return false;
  }


xmlrobot.onreadystatechange = function(){
    if(xmlrobot.readyState==4){

      document.getElementById("content").innerHTML="";

      var fade = xmlrobot.responseText;
      jNode = $(fade);
      jNode.hide();
      $('#content').append(jNode);
            
      jNode.fadeIn(2000);

    }else{

      document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

    }

}

xmlrobot.open("GET",url,true);
xmlrobot.send(null);

}

 news();
 pmnotif();
 
 function myFunction() {
    document.getElementById("Demo").classList.toggle("w3-show");
}  


function confirmtreat(){

  var detent = document.getElementById('detain').value;
  var remark = document.getElementById('remark').value;
  var treatconf = confirm("Do you want to treat?");
      if(treatconf){

            return true;
      }else{

            return false;
      }

   /* if((detent=='release') && (remark!='released') ){

      alert('Released not selected !');
      return false;
    }*/
}


function page(page,index,id,data){
  
  var xmlHTTP= new XMLHttpRequest();

  if(xmlHTTP==null){
    alert("Your browser does not support Ajax");
    return false;
  }
  
  if(data=="search_ipo"){
    var data = document.getElementById("search_ipo").value;
  }

  if(data=="search_case"){
    var data = document.getElementById("search_case").value;
  }

  //alert(data);

  var url = page+"?"+index+'='+data;
  xmlHTTP.onreadystatechange = function(){
    if (xmlHTTP.readyState==4){
      
      document.getElementById(id).innerHTML="";
      var fade=xmlHTTP.responseText;
      jNode = $(fade);
      jNode.hide();
      $('#'+id).append(jNode);
      jNode.fadeIn(2000);
      
    }else{
      document.getElementById(id).innerHTML="<p style='color:green; font-weight:bold'>Loading...</p>";
      
    }
    
  }
  
xmlHTTP.open("GET",url,true);
xmlHTTP.send();

}




  </script>


  <style> 

    p,h2,a,td{
font-family: monospace;

 }

 th{
  font-family: monospace;
  background-color: #505050   ;
  text-align: center;
  color:white;
 }

  </style>

  <?php
      include("../sidenavfull.php");

  ?>

  </head>


<body style="background-image:url('../img/new.png'); font-family: monospace; background-position:center; background-attachment:fixed; background-size:500px;background-repeat: no-repeat ">


<!-- NEWS UPDATE -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
    <div id="modal-body" class="modal-body">
      <div style="background-color:#696969; padding: 20px">
          <span id="close" class="close">&#8855;</span>          
          <p style='text-align: center; color: white; font-size: 20px'> NEWS UPDATE</p>
       </div><hr>
              <form method="POST">
                <input placeholder="Subject" required type="text" name="subject" class="form-control"><hr>
                <textarea placeholder="Description..." rows="6" required name="newsinfo" class="form-control" ></textarea><p></p>
                <input type="submit" name="subnews" class=" form-control btn btn-success" value="SUBMIT">
              </form>
    </div>

    <div id='foot'>
      <div  id='footcolor' role="progressbar" style= 'color:white; font-family: monospace'> </div>
    </div>
    
  </div>

</div>


<!-- AGENT MODAL -->
<div id="agentmodal" class="newmodal">

  <!-- Modal content -->
  <div class="newmodal-content">
    <span id="agentclose" class="newclose">x</span><br>
                              
           <h3 class="text-center">ADD I.P.O</h3>   
              <div class="form-group text-center">
              <form method="POST" >
                     <div class="col-md-12">
                         <input id="agentforce" required class="form-control" type="number" placeholder="FORCE ID" name="agentforce" ><br>
                      </div>
                      <div class="col-md-6">
                         <input id="agentpass"  required class=" form-control" type="text" placeholder="PASSWORD" name="agentpass" ><br>
                      </div>
                      <div class="col-md-6"><a href="#" id="genpass" class="btn btn-info">Generate Password</a></div>
                      <div class="col-md-12">
                            <select required class="form-control" name="rank" >
                                  <option value="">--SELECT RANK--</option>
                                  <option value="csp">CSP</option>                              
                                  <option value="SP">SP</option>                              
                                  <option value="dsp">DSP</option>                              
                                  <option value="asp">ASP</option>                              
                                  <option value="inspector">Inspector</option>                              
                                  <option value="sergent">Sergent</option>                              
                                  <option value="corporal">Corporal</option>                              
                                  <option value="constable">Constable</option>                              
                            </select>                        
                      </div>
                         <label>Activate</label> <input id="agentactive"  class="" type="checkbox"  name="agentactive" > |
                         <label>Admin</label> <input id="admin"  class="" type="checkbox"  name="admin" ><br>
                         <p id="notify"></p><br>
                         <input type="submit" name="saveagent" class="btn btn-success" value="Create Profile">
                         <!-- <a href="#" id="saveagent"  class="btn btn-success">Create Profile</a> -->
               </form>   
              </div>                 


   </div> 


</div>



<!-- CONFIRM CAUTION  MODAL -->
<div id="cautionmodal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    
          <div id="caution-body" class="modal-body"><hr>
          <p style='text-align: center; color: #B22222; font-size: 20px'> DO YOU WANT TO PROCEED TO <i>CAUTION FORM</i>?</p><hr>
              
                <a class="form-control text-center" id="yes" href="#">YES</a><br>

                 <a  id="no" class="form-control text-center" href="#">NO</a>           
          </div>
    
  </div>

  <p hidden id="setcautiontime"></p>

</div>



<!-- TREAT MODAL -->
<div id="treatmodal" class="newmodal">

    <div id="treatbody">
      <!-- Modal content -->
      

    </div>
</div>




<!-- PM VIEW MODAL -->
<div id="pmview" class="newmodal">

    <div id="pmbody">
      <!-- Modal content -->
      

    </div>
</div>



<!-- AGENT PROFILE VIEW MODAL -->
<div id="agentview" class="newmodal">

    <div id="agentbody">
      <!-- Modal content -->
      

    </div>
</div>







<div class="container-fluid " >


  <div class="col-md-2 "> 



  <p class="text-center" ><img  style="height: 150px; " src="../img/logo.png"></p><hr>
  <p style="text-align: center; font-weight: bold; font-style: italic"><span style="color:green" class="glyphicon glyphicon-user"></span> <?php echo   $force_id;?></p><hr>


      <!-- <a href="#" class="btn btn-primary form-control" onclick="form();" role="button"><span  class="glyphicon glyphicon-file"></span> Form</a> -->

       <button class="btn btn-default form-control " onclick="myFunction()" style="background-color:#878787; color:white" ><span  class="glyphicon glyphicon-file"></span> Forms <span class="caret"></span></button>
              <ul type="none" id="Demo" class="w3-dropdown-content w3-card-4 w3-animate-bottom">
                <li role="presentation"><a class="btn btn-success form-control" onclick="form();"  href="#">PLAIN</a></li>
                <p></p>
                <li role="presentation"><a class="btn btn-danger form-control"  id="cauformbtn" href="#">CAUTION</a></li>
              </ul>
   
      <hr>
      <a href="#" class="btn btn-danger form-control" onclick="casefile();" role="button" ><span style="color:black" class="glyphicon glyphicon-folder-open"></span> Case File</a><hr>
      <a href="#" class="btn btn-primary form-control" onclick="pm();" role="button"><span   class="glyphicon glyphicon-envelope"></span> PM <span id="pmnotify1" class="badge"></span></a><hr>
<?php
if($level==1)
echo "
      <a href='#'' class='btn btn-warning form-control' onclick='agents();' role='button'><span class='glyphicon glyphicon-star'></span> Agents</a><hr>
      ";

      ?>

      <a href="#" class="btn btn-primary form-control" onclick="profile();" role="button"><span style="color:red" class="glyphicon glyphicon-user"></span> Profile</a><hr>
      <a href="#" class="btn btn-primary form-control" onclick="logs();" role="button"><span  class="glyphicon glyphicon-eye-open"></span> Logs</a><hr>
  <div class="row">
  

  </div>
  </div>
   <div class="col-md-1"></div>
  <div class="  col-md-9">
    
      <ul class="nav nav-pills">
        <li><a href="#" class="btn btn-info " onclick="news();" role="button">News</a></li>
        <li><a href="#" class="btn btn-primary " onclick="cellboard();" role="button">Cell State Board</a></li>

        
        <li style="float:right"><a href="../logout.php" class="btn btn-danger" role="button" ><span class="glyphicon glyphicon-off"></span> Logout </a></li>
      </ul><hr>

      

      <div id="content">
        




      </div>
    </div>
    
                    </div>

 </body>
 </html>

<script>


function plain_view(viewid){
  

        var xmlrobot = getXMLHttpRequest();
               var url="../portal/plain_view.php?tyme="+viewid;
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
              
             xmlrobot.onreadystatechange = function(){
                  if(xmlrobot.readyState==4){

                    document.getElementById("treatbody").innerHTML=xmlrobot.responseText;
                    /*var fade = xmlrobot.responseText;
                    jNode = $(fade);
                    jNode.hide();
                    $('#treatbody').append(jNode);*/
                          
                    //jNode.fadeIn(2000);

                  }else{

      document.getElementById("treatbody").innerHTML='<center><img  src="../img/loading.gif"></center>';

    }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);

  
            var treatmodal = document.getElementById("treatmodal");           
            treatmodal.style.display="block";
  
}


function caution_view(viewid){
  

        var xmlrobot = getXMLHttpRequest();
               var url="../portal/caution_view.php?tyme="+viewid;
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
              
             xmlrobot.onreadystatechange = function(){
                  if(xmlrobot.readyState==4){

                    document.getElementById("treatbody").innerHTML=xmlrobot.responseText;
                    /*var fade = xmlrobot.responseText;
                    jNode = $(fade);
                    jNode.hide();
                    $('#treatbody').append(jNode);*/
                          
                    //jNode.fadeIn(2000);

                  }else{

      document.getElementById("treatbody").innerHTML='<center><img  src="../img/loading.gif"></center>';

    }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);

  
            var treatmodal = document.getElementById("treatmodal");           
            treatmodal.style.display="block";
  
}



function history_view(viewid){
  

        var xmlrobot = getXMLHttpRequest();
               var url="../portal/history_view.php?tyme="+viewid;
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
              
             xmlrobot.onreadystatechange = function(){
                  if(xmlrobot.readyState==4){

                    document.getElementById("treatbody").innerHTML=xmlrobot.responseText;
                    /*var fade = xmlrobot.responseText;
                    jNode = $(fade);
                    jNode.hide();
                    $('#treatbody').append(jNode);*/
                          
                    //jNode.fadeIn(2000);

                  }else{

      document.getElementById("treatbody").innerHTML='<center><img  src="../img/loading.gif"></center>';

    }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);

  
            var treatmodal = document.getElementById("treatmodal");           
            treatmodal.style.display="block";
  
}


function news_view(viewid){
  

        var xmlrobot = getXMLHttpRequest();
               var url="../portal/news_view.php?tyme="+viewid;
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
              
             xmlrobot.onreadystatechange = function(){
                  if(xmlrobot.readyState==4){

                    document.getElementById("treatbody").innerHTML=xmlrobot.responseText;
                    /*var fade = xmlrobot.responseText;
                    jNode = $(fade);
                    jNode.hide();
                    $('#treatbody').append(jNode);*/
                          
                    //jNode.fadeIn(2000);

                  }else{

      document.getElementById("treatbody").innerHTML='<center><img  src="../img/loading.gif"></center>';

    }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);

  
            var treatmodal = document.getElementById("treatmodal");           
            treatmodal.style.display="block";
  
}



//var treat =document.getElementById("treatmode");
 function treat(treatid){
  

        var xmlrobot = getXMLHttpRequest();
               var url="../portal/treat.php?tyme="+treatid;
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
              
             xmlrobot.onreadystatechange = function(){
                  if(xmlrobot.readyState==4){

                    document.getElementById("treatbody").innerHTML=xmlrobot.responseText;
                    /*var fade = xmlrobot.responseText;
                    jNode = $(fade);
                    jNode.hide();
                    $('#treatbody').append(jNode);*/
                          
                    //jNode.fadeIn(2000);

                  }else{

      document.getElementById("treatbody").innerHTML='<center><img  src="../img/loading.gif"></center>';

    }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);

  
            var treatmodal = document.getElementById("treatmodal");           
            treatmodal.style.display="block";
  
}

function pmclose(){

        var treatconfi = confirm("Do you want to close?");
   if(treatconfi){
              
        var pmmodal = document.getElementById("pmview");           
            pmmodal.style.display="none";
}

    }

function agent_close(){

        var treatconfi = confirm("Do you want to close?");
   if(treatconfi){
              
        var modal = document.getElementById("agentview");           
            modal.style.display="none";
}

    }


function treatclose(){

        var treatconf = confirm("Do you want to close?");
   if(treatconf){
        var treatmodal = document.getElementById("treatmodal");  
          
            treatmodal.style.display="none";
           
}

    }

  


 var cauformbtn = document.getElementById("cauformbtn");
 cauformbtn.onclick=function(){
  
        cauform();
        //alert("hi");
   }


  function updatenews(){
 
 var update = document.getElementById("myModal");
 update.style.display="block";
//alert("Sup new");
}

var update = document.getElementById("myModal");
document.getElementById("close").onclick = function(){

    update.style.display="none";
}




/* Open when someone clicks on the span element */
function openNav(ID) {

  var station = document.getElementById("station").value;
  var fname =document.getElementById("fname").value;
  var lname =document.getElementById("lname").value;
  var male =document.getElementById("male").checked;
  var female =document.getElementById("female").checked;
  var age =document.getElementById("age").value;
  var occupation =document.getElementById("occupation").value;
  var religion =document.getElementById("religion").value;
  var nation =document.getElementById("nation").value;
  var address =document.getElementById("address").value;
  var telephone= document.getElementById("telephone").value;
  var command =document.getElementById("command").value;
  var passbtn =document.getElementById("passbtn").value;

  if((station&&fname&&lname&&age&&occupation&&religion&&nation&&address&&telephone&&command)){

    if((male||female)){
     
     if(passbtn==""){
          var imageconfirm = confirm('No Image, Do you want to continue?');
          if(imageconfirm)
                      document.getElementById(ID).style.width = "100%";
              }else{
                      document.getElementById(ID).style.width = "100%";
              }
     
    }else{
      alert("Please select your Gender.");
    }

  }else{
    alert("Please complete the required form.");
  }

   
}



/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav(ID) {
  
  var confi=confirm("Do you want to close?");
 if(confi){
    document.getElementById(ID).style.width = "0%";
  }else
    return false;
    }




var no =document.getElementById("no");
no.onclick= function(){
      if(confirm("Sure you want to close?")){
            document.getElementById("setcautiontime").innerHTML="";
            window.location.assign("./");
      }
  
}




var yes =document.getElementById("yes");
yes.onclick= function(){
  var time = document.getElementById("setcautiontime").innerHTML;
      if(!(time=="")){

        window.location.assign("./");
      }else{

            
            //window.location.assign("./?cauform=form");
            cauform();

      }
            var cautionmodal = document.getElementById("cautionmodal");           
            cautionmodal.style.display="none";
  
}



function cauform(){

         
        var sess =" <?php echo $_SESSION['cauform']; ?>"; 
        var xmlrobot = getXMLHttpRequest();
               var url="../portal/form_caution.php";
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
              

          if(sess!=" "){

              xmlrobot.onreadystatechange = function(){
                  if(xmlrobot.readyState==4){

                    document.getElementById("content").innerHTML="";
                    var fade = xmlrobot.responseText;
                    jNode = $(fade);
                    jNode.hide();
                    $('#content').append(jNode);
                          
                    jNode.fadeIn(2000);

                  }else{

      document.getElementById("content").innerHTML='<center><img  src="../img/loading.gif"></center>';

    }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);

      }else{
                alert("Plain form not filled");
                  }

        }





function checkforce(){

      var receiver_id = document.getElementById("receiver_id").value;
      var xmlrobot = getXMLHttpRequest();
            var url="../portal/id_check.php?id="+receiver_id;
               
              if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }
        if(receiver_id!=""){        
              
      xmlrobot.onreadystatechange = function(){

           if(xmlrobot.readyState==4){

                   var check = document.getElementById("checkid"); //.innerHTML=xmlrobot.responseText;

                   var check_val=xmlrobot.responseText;

                  // console.log(check_val);

                      if(check_val==0){

                          check.innerHTML = "<b style='font-style:italic; color:green'> Id confirmed...</b>";
                      }else if(check_val==1){

                          check.innerHTML = "<b style='font-style:italic; color:red'> owns id...</b>";
                              document.getElementById("receiver_id").value="";
                      }else{

                        check.innerHTML = "<b style='font-style:italic; color:red'>force id does not exists...</b>";
                              document.getElementById("receiver_id").value="";
                      }

                  }else{

                document.getElementById("checkid").innerHTML='<center><img  src="../img/loader.gif"></center>';

               }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);
}else{

      document.getElementById('checkid').innerHTML= "";

}
    }


function view_inbox(valuee,rowColor,title){

    
    var xmlrobot = getXMLHttpRequest();
    var url="../portal/pm_proc.php?value="+valuee+"&title="+title;
               
      if(xmlrobot==null){
            alert("Your browser does not support Ajax");
            return false;
                }
              
    xmlrobot.onreadystatechange = function(){

          if(xmlrobot.readyState==4){

            document.getElementById('pmbody').innerHTML= xmlrobot.responseText;
            document.getElementById('pmview').style.display ="block";
                          
                          pmnotif();
            }

}

document.getElementById(rowColor).style.backgroundColor="#FFFFFF";
xmlrobot.open("GET",url,true);
xmlrobot.send(null);


  }

function agent_profile(profile){

          var xmlrobot = getXMLHttpRequest();
          var url="../portal/agent_profile.php?id="+profile;               
      if(xmlrobot==null){
                  alert("Your browser does not support Ajax");
                  return false;
                }

              xmlrobot.onreadystatechange = function(){
                  if(xmlrobot.readyState==4){

                    document.getElementById("agentbody").innerHTML=xmlrobot.responseText;
                      document.getElementById('agentview').style.display ="block";                   

                  }else{

      document.getElementById("agentbody").innerHTML='<center><img  src="../img/loader.gif"></center>';

    }

}


xmlrobot.open("GET",url,true);
xmlrobot.send(null);
}










</script>




<?php  

if((isset($_GET['agents'])) || (isset($_GET['ab23fd530k']))){ 
?>

        <script>
                agents();
        </script>

<?php

 }elseif(isset($_GET['XninjvhHFHUJDScsakhcv'])){
        $countexp = base64_decode($_GET['TnUoC']);
        if(time()<=$countexp){
        ?>

      <script>
             
             var cautionmodal = document.getElementById("cautionmodal");
             
             cautionmodal.style.display="block";   
             
              //alert(time);
      </script>

<?php
}
 }elseif(isset($_GET['cauform'])){

?>
        <script>
               cauform();
               //alert("hi");
        </script>
<?php


 }elseif(isset($_GET['case'])){
        $ttime=$_GET['case'];

      if($ttime>time()){
?>
        <script>
               casefile();
               //alert("hi");
        </script>
<?php
}

 }elseif(isset($_GET['sent'])){
        $tsent=base64_decode($_GET['sent']);

      if($tsent>time()){
?>
        <script>
               pm();
               //alert("hi");
        </script>
<?php
}

 }


 ?>