<?php
require('dbconnect.php');
session_start(); 

$cust_id = $_SESSION['cust_id']; 

// If form submitted, insert values into the database.
if (isset($_REQUEST['submit']))
{
        // removes backslashes
  $cust_id = stripslashes($_REQUEST['cust_id']);
  $cust_id = mysqli_real_escape_string($mysqli,$cust_id);
  $cust_pass = stripslashes($_REQUEST['cust_pass']);
  $cust_pass = mysqli_real_escape_string($mysqli,$cust_pass);
  $cust_name = stripslashes($_REQUEST['cust_name']);
  $cust_name = mysqli_real_escape_string($mysqli,$cust_name); 
  $cust_add = stripslashes($_REQUEST['cust_add']);
  $cust_add = mysqli_real_escape_string($mysqli,$cust_add);
  $cust_pno = stripslashes($_REQUEST['cust_pno']);
  $cust_pno = mysqli_real_escape_string($mysqli,$cust_pno);
  $cust_email = stripslashes($_REQUEST['cust_email']);
  $cust_email = mysqli_real_escape_string($mysqli,$cust_email);
  // $trn_date = date("d-m-y H:i:s");
$sql ="INSERT into customer VALUES(' ', '$cust_id', '$cust_pass' , '$cust_name' , '$cust_add' , '$cust_pno' , '$cust_email')";
$result = mysqli_query($mysqli,$sql);
if($result)
{
    mysqli_commit($mysqli);
    print '<script>window.location.assign("custSignUp.php");</script>'; 
    $_SESSION['cust_name'] = $_POST['cust_name']; 
    $_SESSION['cust_id'] = $_POST['cust_id']; 
}
    
else
    { 
    // mysqli_rollback($mysqli);
    echo " Opss... the server is under maintenace, try again later ";
}
}
?>
<!-- ====================================================================================================================================================================================================================================================== ==================================================================================================================================================================== ==================================================================================================================================================================== ==================================================================================================================================================================== ==================================================================================================================================================================== -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <link rel="icon" href="img/favicon.png" type="image/png">
  <title>SteakShop Restaurant | Customer Sign Up</title>
<link rel="stylesheet" href="registrationStyle.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<style type="text/css">
  body{
  font-family: 'Open Sans', sans-serif;
  background-image: url("img/login.png");
  margin: 0 auto 0 auto;  
  width:100%; 
  text-align:center;
  margin: 20px 0px 20px 0px;   
}

p{
  font-size:12px;
  text-decoration: none;
  color:#ffffff;
}

h1{
  font-size:1.5em;
  color:#525252;
}

.box{
  background:white;
  width:300px;
  border-radius:6px;
  margin: 100 auto 0 auto;
  padding:10px 100px 150px 100px;
  border: #333333 4px solid; 
  opacity: 0.8;
 
}

.username{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;
}

.password{
  border-radius:4px;
  background:#ecf0f1;
  border: #ccc 1px solid;
  padding: 8px;
  width:250px;
  font-size:1em;
}

.btn{
  background:#a0a29d;
  width:125px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #a0a29d 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  float:left;
  margin-left:16px;
  font-weight:800;
  font-size:0.8em;
}

.btn:hover{
  background:#656664; 
}

#btn2{
  float:left;
  background:#a0a29d;
  width:125px;  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #a0a29d 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  margin-left:10px;
  font-weight:800;
  font-size:0.8em;
}

#btn2:hover{ 
background:#656664; 
}
</style>


<script type="text/javascript">
  function field_focus(field, usernme)
  {
    if(field.value == username)
    {
      field.value = '';
    }
  }

  function field_blur(field, username)
  {
    if(field.value == '')
    {
      field.value = username;
    }
  }

//Fade in dashboard box
$(document).ready(function(){
    $('.box').hide().fadeIn(1000);
    });

//Stop click event
$('a').click(function(event){
    event.preventDefault(); 
  });
</script>

<body  >

<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>

 <form method="get" action="">
  <div class="box">

    <h1> CUSTOMER SIGN UP </h1><br><hr> 
      
    <br>
  <img src="img/food/food5.jpg" style="width: 100%;   padding-top:0px;" >
  <h1> </h1><br>

   <input type="text" name="cust_id" id="cust_id" onFocus="field_focus(this, 'cust_id');" onblur="field_blur(this, '');" placeholder="Last 4 number of your IC" class="username" style="width: 80%;" required/> <br><br>

   <input type="cust_pass" name="cust_pass"  onFocus="field_focus(this, 'cust_pass');" onblur="field_blur(this, 'cust_pass');" placeholder="Password" class="password" style="width: 80%;" required/><br><br>

 
   <input type="text" name="cust_name"  onFocus="field_focus(this, 'cust_name');" onblur="field_blur(this, '');" placeholder="Full Name" class="username"  style="width: 80%;"/><br><br>
      
      
   <input type="text" name="cust_add"  onFocus="field_focus(this, 'cust_add');" onblur="field_blur(this, '');" placeholder="Address" class="username"  style="width: 80%;"/><br><br>

   <input type="text" name="cust_pno"  onFocus="field_focus(this, 'cust_pno');" onblur="field_blur(this, ' ');" placeholder ="Phone Number" class="username" style="width: 80%;" required/ ><br><br>

   <input type="email" name="cust_email" onFocus="field_focus(this, 'cust_email');" onblur="field_blur(this, ' ');" placeholder="Email" class="username" style="width: 80%;" required/> <br><br>
      
<a href="index.php?cust_id='.$cust_id.'"><div id="btn2 txt-centre"><b>Sign Up</b></div></a> <!-- End Btn2 -->
  
</div> <!-- End Box -->
  
</p>
</div>
</form>
 
</body>
</html>


