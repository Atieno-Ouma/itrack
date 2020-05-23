<?php
session_start();
if(!include_once ("db_connector/config.php")){
           header("location:install.php");
 }
if (!defined('hris')) {
    define('hris', true);
}
if(isset($_SESSION['username'])) {
    if($_SESSION['usertype'] =='admin') // if session variable "username" does not exist.
	header("location:dashboard.php"); // Re-direct to index.php
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>iTrack Login</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/andre_buttons.css">
	<link rel="stylesheet" href="css/cmxform.css">
	<link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
	
	<!-- Scripts -->
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
	<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	
	$(document).ready(function() {
		
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				username: {
					required: true,
					minlength: 3
				},
				password: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 3 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 3 characters long"
				}
			}
		});
	
	});

	</script>
	
</head>
<body style="font-family:Tahoma, Verdana, Georgia, Arial, Impact, Tahoma, Trebuchet MS;">
<div class="row">
	  <div class="header" style="background:url(images/header_bg.png) repeat-x; box-shadow:0 0 10px rgba(12, 3, 25, 0.8); width:100%; margin-top:-18px;height:100px; color:white;">
		    <div id="site-tag" style="text-align:center;">
                <p style="margin-left:30px; font-weight:strong; color:#FFEFFF; margin-top:35px; font-size:36.7px; text-decoration:none;text-shadow:0px 1px 2px #F2F38C;">iPTrack</p>
	        </div>
       </div>
<?php
	include("lib/db.class.php");
	include_once ("db_connector/config.php");  
	$db = new DB($config['database'], $config['host'], $config['username'], $config['password']);
$tbl_name="users"; // Table name

// username and password sent from form 
$myusername=$_REQUEST['username']; 
$mypassword=$_REQUEST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'" ;
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "dashboard.php"
$row = mysql_fetch_row($result);

$_SESSION['id']=$row[0];
$_SESSION['username']=$row[1];
$_SESSION['usertype']=$row[3];

if($row[3]=="admin"){
header("location:dashboard.php");
}
else if
($row[3]=="officer"){
header("location:#");

}else {
header("location:index.php?msg=Sorry%Friend!%Wrong%20Username%20or%20Password&type=error");
}}
?>
<div class="col-lg-4"> 
</div>
<div class="col-lg-4"> 
		<form class="form-horizontal" action="" method="post" id="login-form" autocomplete="off" >
            
		<div class="tagged-elements" style="background:#FEFFFF; margin:0 auto; height:500px; border-radius:2px; text-align:center; border: 2px solid #878E63; box-shadow: 0 0 10px rgba(12, 3, 25, 0.8);">
			   <fieldset><legend> <h3>Login Form</h3></legend></fieldset>
			        <?php 
				
				    if(isset($_REQUEST['msg']) && isset($_REQUEST['type']) ) {
					
					if($_REQUEST['type'] == "error")
						$msg = "<div class='error-box round'>".$_REQUEST['msg']."</div>";
					else if($_REQUEST['type'] == "warning")
						$msg = "<div class='warning-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "confirmation")
						$msg = "<div class='confirmation-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "information")
						$msg = "<div class='information-box round'>".$_REQUEST['msg']."</div>"; 	
						
					echo $msg;						
				}
				?>
			 <div>
			       <div id="">
			          <label style="text-align:center;">Username</label>
			          <input  type="text" id="login-username" placeholder="Enter Username" name="username" style="width:87%; margin:0 auto;"class="form-control" autofocus required>
				   </div>
				    <div id="">
			          <label style="text-align:center">Password</label>
			         <input type="password" id="login-password" name="password" class="form-control" style="width:87%; margin:0 auto;" placeholder="Enter Password" autofocus required>
					</div>
			 </div>
			 <div>
			      <div class="box-footer" style="margin-top:3px;">
                    <button type="submit" name="appointment" class="btn btn-primary">Login</button>
                  </div>
		     </div>
			  <div class="forgotten_logins">
			        <div id="">
			           Remember Me:<input type="checkbox" name="remember" id="remember"  autocomplete="off">
					</div>
                    <p><a href="#">Cannot Remember my Password or Username</a></p>
              </div>
		</div>
		     </form>
</div>
<div class="col-lg-4"> 
</div>
<div class="col-lg-12" style="margin-bottom:0px;"> 
<footer class="logo-footer" style="background: #FEFFFF; border: 2px solid #878E63;text-align:center; position:; box-shadow: 0 0 10px rgba(12, 3, 25, 0.8); width:100%;">
		<p>
                  <a href="http://www.intrahealth.org/"><img src="images/Intrahealth_Logo_RGB.png" alt="IntraHealth (logo)" width="158" height="40" id="intrahealth"></a>
                 <a href="http://www.health.go.ug/index.htm"><img src="images/moh_logo.png" alt="Uganda Ministry of Health (logo)" width="40" height="40" id="moh"></a>
         </p>
 <footer class="main-footer" style="background:#C02525 url(images/foot.png) repeat-x;text-align:center; position:inherit; width:100%; color:white;">
 <strong style="">Copyright &copy;  <a href="http://intrahealth.org" target="blank" style="color: black;">IntraHealth International</a></strong> All rights reserved <version>iTrack 1.0.0</version>
  </footer>
  </footer>
</div>
</div>

</body>

</html>
