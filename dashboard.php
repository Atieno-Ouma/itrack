<?php
session_start();
$action="";
if(isset($_GET['action']))
$action=$_GET['action'];
include_once("init.php");
?>
 <?php $u=$hris['username']; $line = $db->queryUniqueObject("SELECT * FROM users WHERE `username`='$u'");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="Agaba Andrew">

    <title>IntraHealth International iTrack</title>
	<!----links-------------->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="bootstrap/css/andre_buttons.css" rel="stylesheet">
	
	<?php include_once("engine/header.php")?>
    <link href="bootstrap/css/icons.css" rel="stylesheet">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="sys-name" href="dashboard.php">iPTrack</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown" style="font-family:papyrus;">
                    <button href="?action=read_message" class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></button>
                <ul class="dropdown-menu message-dropdown">
					 <?php
	                $id=$line->id;					
					$sql="SELECT * FROM `messages` where `uuid`='$id' ORDER By Send_Date DESC";
					$result = mysql_query($sql);
					while($row = mysql_fetch_array($result)) 
                      {
                      ?>
                        <li class="message-preview">   
                            <a href="?message=%mid=<?php echo $mid=$row['id'];?>">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $row['Sender'];?></strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i>Sent on <?php echo $row['Send_Date'];?> At <?php $tm=$row['Send_Time'];$tm=time(); echo $tm; ?></p>
                                        <p><?php echo $row['Subject'];?></p>
                                    </div>
                                </div>
                            </a>
                        </li>
					<?php  } ?>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <button href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></button>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#"><span class="label label-warning pull-left">4</span><p>Pending Tasks</p></a>
                        </li>
                        <li>
                            <a href="#"><span class="label label-primary pull-left">4</span><p>Tasks in Progress</p></a>
                        </li>
                        <li>
                            <a href="#"><span class="label label-success pull-left">4</span><p>Accomplished Tasks</p></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <button href="logout.php" class="dropdown-toggle btn btn-danger" data-toggle="dropdown" style="background:#000;inner-box-shadow: 0 0 10px rgba(12, 3, 25, 30);"></i>Logout <?php echo $fu=$line->fname; echo " "; echo $fu=$line->lname;?><b class="caret"></b></button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?action=profile=%uuid=<?php echo $id; ?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="?action=messages=%uuid=<?php echo $id; ?>"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="?action=settings"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				    <div class="company_name" style="font-weight:bold; color:black; text-align:center; width:100%; margin:0 auto;>">
					 <a href="http://www.intrahealth.org/"><img src="images/Intrahealth_Logo_RGB.png" alt="IntraHealth (logo)" width="170" height="50" id="intrahealth"></a>
	                  <p><img src="dist/img/mvp.jpg" class="img-circle" alt="User Image" width="45" height="45"></p>
					 </div>
					
                    <li>
                        <a href="?action=home"><i class="fa fa-fw fa-table"></i>Home</a>
                    </li>
					<li>
                        <a href="?action=start_mne_activity"><i class="fa fa-fw fa-table"></i>Start Activity</a>
                    </li>
					<li>
                        <a href="?action=activities"><i class="fa fa-fw fa-table"></i>Manage Activities</a>
                    </li>
					<li>
                        <a href="?action=people"><i class="fa fa-fw fa-table"></i>Manage People</a>
                    </li>
					<li>
                        <a href="?action=facility"><i class="fa fa-fw fa-table"></i>Institutions / Facilities</a>
                    </li>
                    
					<li>
                        <a href="?action=reports"><i class="fa fa-fw fa-table"></i>Reports</a>
                
                    </li>
		            <li>
                        <a href="?action=inventory"><i class="fa fa-fw fa-table"></i>Inventory</a>
                    </li>
					<li>
                        <a href="?action=settings"><i class="fa fa-fw fa-table"></i>Transport Manager</a>
                    </li>
					<li>
                        <a href="?action=settings"><i class="fa fa-fw fa-table"></i>Travel Utility</a>
                    </li>
					<li>
                        <a href="?action=settings"><i class="fa fa-fw fa-table"></i>System Settings</a>
                    </li>
                    </li>
                </ul>
            </div>
					
            <!-- /.navbar-collapse -->
     </nav>
     <div id="page-wrapper" class="sector">
            <div class="container-fluid">
                               <?php
							   //Logical activity loader
								if ($action=="people" || $action=="home" || $action=="" )
								//start manage people
								//focal_persons
								include_once("modules/manage_people/hris_users/add_users.php");
								elseif($action=="save_user")
								include("modules/manage_people/hris_users/view_user.php");
								elseif($action=="manage_users")
								include_once("modules/manage_people/hris_users/manage_users.php");
								elseif($action=="manage_app")
								include("modules/manage_people/hris_users/update_user.php");
								//officials sub-module
								elseif($action=="add_official")
								include_once("modules/manage_people/officials/add_official.php");
								elseif($action=="save_user")
								include("modules/manage_people/officials/view_official.php");
								elseif($action=="manage_users")
								include_once("modules/manage_people/officials/manage_official.php");
								elseif($action=="manage_app")
								include("modules/manage_people/officials/update_official.php");
								//end of module
								//Begin New Module Activities
								//mne
					            elseif($action=="start_mne_activity")
								include_once("modules/activities/mne/add_mne_activity.php");
								elseif($action=="save_user")
								include("modules/activities/mne/view_official.php");
								elseif($action=="manage_users")
								include_once("modules/activities/mne/manage_official.php");
								elseif($action=="manage_app")
								include("modules/activities/mne/update_official.php");
								//hris activity
								elseif($action=="start_hris_activity")
								include_once("modules/activities/hris/start_hris_activity.php");
								elseif($action=="save_user")
								include("modules/activities/hris/view_activity.php");
								elseif($action=="manage_users")
								include_once("modules/activities/hris/manage_activity.php");
								elseif($action=="manage_app")
								include("modules/activities/hris/update_activity.php");
								//End Module Activities
								?>
								
            </div>
            <!-- /.container-fluid -->
    </div>
        <!-- /#page-wrapper -->
    </div>
 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
    <footer class="logo-footer" style="background: #FEFFFF; border: 2px solid #878E63;text-align:center; position:relative; bottom:0px; box-shadow: 0 0 10px rgba(12, 3, 25, 0.8); width:100%;">
		<p>
                  <a href="http://www.intrahealth.org/"><img src="images/Intrahealth_Logo_RGB.png" alt="IntraHealth (logo)" width="158" height="40" id="intrahealth"></a>
                 <a href="http://www.health.go.ug/index.htm"><img src="images/moh_logo.png" alt="Uganda Ministry of Health (logo)" width="40" height="40" id="moh"></a>
         </p>
  <footer class="main-footer" style="background:#C02525 url(images/foot.png) repeat-x;text-align:center; position: relative; width:100%; color:white;">
  <strong style="">Copyright &copy;  <a href="http://intrahealth.org" target="blank" style="color: black;">IntraHealth International</a></strong> All rights reserved <version>iTrack 1.0.0</version>
  </footer>
  </footer>


</html>
