<?php 
	error_reporting (E_ALL ^ E_NOTICE);
	include("lib/db.class.php");
        if(!include_once("db_connector/config.php")){
		  header ("location:install.php");
 }
	// Open the base (construct the object):
	$db = new DB($config['database'], $config['host'], $config['username'], $config['password']);
	
	# Note that filters and validators are separate rule sets and method calls. There is a good reason for this. 

	require "lib/gump.class.php";
	
	$gump = new GUMP(); 
	
	
	// Messages Settings
	$hris = array();
	$hris['username'] = $_SESSION['username'];
	$hris['usertype'] = $_SESSION['usertype'];
	$hris['msg'] 		= '';
	if(isset($_REQUEST['msg']) && isset($_REQUEST['type']) ) {
					
					if($_REQUEST['type'] == "error")
						$hris['msg'] = "<div class='error-box round'>".$_REQUEST['msg']."</div>";
					else if($_REQUEST['type'] == "warning")
						$hris['msg'] = "<div class='warning-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "confirmation")
						$hris['msg'] = "<div class='confirmation-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "infomation")
						$hris['msg'] = "<div class='information-box round'>".$_REQUEST['msg']."</div>"; 
	}
?>