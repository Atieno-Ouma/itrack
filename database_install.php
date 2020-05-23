<?php session_start();

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HRIS Track</title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
	
	<!-- Scripts -->
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
	
	<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	
	$(document).ready(function() {
		document.getElementById('create').checked=true;
		document.getElementById('select_box').disabled=true;
                
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				name: {
					required: true,
					minlength: 3
				}
				
			},
			messages: {
				name: {
					required: "Please Enter The Database Name",
					minlength: "Your Database must consist of at least 3 characters"
				}
			}
		});
	
	});
function create_data(){
document.getElementById("select_box").disabled=true;
document.getElementById("name").disabled=false;
             
}
function select_data(){
document.getElementById("select_box").disabled=false;
document.getElementById("name").disabled=true;
               
}
	</script>
        <style type="text/css">
            
            </style>
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

<!--    Only Index Page for Analytics   -->
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
		</div> <!-- end full-width -->	
	
	</div> 
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
			
				<h2>Set Up DataBase </h2>	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	<?php
         if((isset($_POST['host']) and isset($_POST['username']) and $_POST['host']!="" and $_POST['username']!="") or (isset($_SESSION['host']) and isset($_SESSION['user'])))
        {
          
            if(isset($_SESSION['host'])){
            $host= $_SESSION['host'];
            $user=$_SESSION['user'];
            $pass=$_SESSION['pass'];
            }
               if(isset($_POST['host'])){
            $host=  trim($_POST['host']);
            $user= trim($_POST['username']);
            $pass= trim($_POST['password']); 
             }
                        $link = mysql_connect("$host","$user","$pass");
if (!$link) {
    $data="Database Configration is Not vaild";
      header("location:install.php?msg=$data");
      exit;
}

        ?>
		<form action="setup.php" method="post" id="login-form">
		
                    <fieldset  >
				<p> <?php 
				
				if(isset($_REQUEST['msg'])) {
					
					$msg=$_REQUEST['msg'];
					echo "<p style=color:red>$msg</p>";						
				}
				?>
				
				</p>
				<p>
                                    <?php 
                                    $con=mysqli_connect("$host","$user","$pass");
                            // Check connection
                                 $sql="CREATE DATABASE ihris_track";
                                  if (mysqli_query($con,$sql)){
                                       $sql="DROP DATABASE ihris_track";
                                 mysqli_query($con,$sql);
  
                                    ?>
                                    <input type="radio" value="1" name="select[]"  id="create" onClick="create_data()" >Create New DataBase
                                        <input type="text" id="name" class="round full-width-input" name="name" autofocus  />
				<?php 
                                  }else{
                                      ?>
                                          
                                        <input type="radio"  disabled="disabled"  >Create New DataBase
                                         <input type="text" disabled="disabled" class="round full-width-input" placeholder="No Permission To Create New Database" name="name" autofocus  /> 
                                          <?php
                                  }
                                  ?>
                                
                                
                                </p>
				<p>					
                                    <input type="radio" name="select[]" id="select" onClick="select_data()" >Select Created DataBase<br>
                                    <select name="select_box" class="round full-width-input" id="select_box" style="padding: 5px 10px 5px 10px; border: 1px solid #D9DBDD;">
                                    <?php 


$dbh = new PDO( "mysql:host=$host", $user, $pass );
$dbs = $dbh->query( 'SHOW DATABASES' );

while( ( $db = $dbs->fetchColumn( 0 ) ) !== false )
{
    echo "<option value=".$db." style=margin:10px 10px 10px 10px;><p >$db</p></option>";
}
                                       ?>
                                      </select> 
                                   
				</p>
                                <input type="hidden" name="host" value="<?php echo $host ?>">
				
                                <input type="hidden" name="username" value="<?php echo $user ?>">
                                <input type="hidden" name="password" value="<?php echo $pass ?>">
				
                                <br>
                                <input type="checkbox" name="dummy" value="1" ><label>Add default Users</label>
                               <br>
                               <br>
				<input type="submit" name="submit" value="Begin Installation">
			</fieldset>

		</form>
		
	</div> <!-- end content -->
	  <?php } ?>
	
	
	<!-- FOOTER -->
	<div id="footer">	
	</div> <!-- end footer -->
      
</body>
</html>
