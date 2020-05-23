<?php session_start();
 if(isset($_POST['host']) and isset($_POST['username'])  and $_POST['host']!="" and $_POST['username']!="")
        {
         $host=  trim($_POST['host']);
            $user= trim($_POST['username']);
            $pass= trim($_POST['password']); 
            $name;
            if(isset($_POST['name'])){
                $name=$_POST['name'];
            }
            if(isset($_POST['select_box'])){
                $name=$_POST['select_box'];
            }
            $_SESSION['host']=$host;
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;
            $_SESSION['db_name']=$name;
                    $link = mysql_connect("$host","$user","$pass");
if (!$link) {
    $data="Database Configration is Not vaild";
      header("location:install.php?msg=$data");
      exit;
}

$con=mysqli_connect("$host","$user","$pass");
// Check connection
 if(isset($_POST['name'])){
$sql="CREATE DATABASE $name";
if (!mysqli_query($con,$sql)){
    $data="This Database Name Is Already In the DataBase";
      header("location:database_install.php?msg=$data");
      exit;
}
 }
        
        $con=mysqli_connect("$host","$user","$pass","$name");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $dummy=0;
if(isset($_POST['dummy'])){
    $dummy=1;
}
//table1
           $sql="CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);

if($dummy===1){
$sql="INSERT INTO `users` (`id` , `username` , `password` , `usertype` , `fname` , `lname`)
VALUES 
(NULL , 'itrack_7123', 'track', 'admin', 'IntraHealth', 'Administrator'), 
(NULL , 'admin', 'admin', 'admin', 'System', 'Administrator'), 
(NULL , 'field_officer', 'track', 'officer', 'Field', 'Officer')" ;
mysqli_query($con,$sql);
}
//table2

          $sql="CREATE TABLE IF NOT EXISTS `Facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Health_Institution` varchar(255) NOT NULL,
  `Institution_Type` varchar(50) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `System_used` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Health_Institution` (`Health_Institution`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
 //table3
 $sql="CREATE TABLE IF NOT EXISTS `HrH_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Start_Date` date NOT NULL,
  `End_Date` date DEFAULT NULL,
  `Actitity_Name` varchar(200) NOT NULL,
  `Resource_Person_1` varchar(11) NOT NULL,
  `Resource_Person_2` varchar(11) DEFAULT NULL,
  `Resource_Person_3` varchar(11) DEFAULT NULL,
  `Resource_Person_4` varchar(11) DEFAULT NULL,
  `Health_Institution_1` varchar(11) NOT NULL,
  `Health_Institution_2` varchar(11) DEFAULT NULL,
  `Health_Institution_3` varchar(11) DEFAULT NULL,
  `Health_Institution_4` varchar(11) DEFAULT NULL,
  `Supervisor` varchar(11) NOT NULL,
  `TOR` longblob DEFAULT NULL,
  `Acitity Matrix` longblob DEFAULT NULL,
  `Supervisor_Notes` text NOT NULL,
  `Resource_Person_Notes` text NOT NULL,
  `Activity_Report` longblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table4
          $sql="CREATE TABLE IF NOT EXISTS `HRIS_Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Surname` varchar(25) NOT NULL,
  `First_name` varchar(25) NOT NULL,
  `Othernames` varchar(50) DEFAULT NULL,
  `Position` varchar(50) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Photo_name` varchar(25) DEFAULT NULL,
  `Photo` longblob DEFAULT NULL,
  `Contact` text NOT NULL,
  `User_Type` varchar(40) NOT NULL,
  `Health_Institution` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table5
          $sql="CREATE TABLE IF NOT EXISTS `hris_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Health_Institution` varchar(255) NOT NULL,
  `Location` varchar(11) NOT NULL,
  `Regional_HR_Officer` int(11) NOT NULL,
  `Indicator1` int(11) DEFAULT NULL,
  `Indicator2` int(11) DEFAULT NULL,
  `Indicator3` int(11) DEFAULT NULL,
  `Indicator4` int(11) DEFAULT NULL,
  `Indicator5` int(11) DEFAULT NULL,
  `Indicator6` int(11) DEFAULT NULL,
  `Indicator7` int(11) DEFAULT NULL,
  `Indicator8` int(11) DEFAULT NULL,
  `Indicator9` int(11) DEFAULT NULL,
  `Indicator10` int(11) DEFAULT NULL,
  `Online_Records` int(11) NOT NULL,
  `Offline_Records` int(11) NOT NULL,
  `Notes` text DEFAULT NULL,
  `Key_name` varchar(25) DEFAULT NULL,
  `Indicator_Key` longblob NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
//table6
mysqli_query($con,$sql);
          $sql="CREATE TABLE IF NOT EXISTS `Location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `District` varchar(50) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `Country` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `District` (`District`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table7
$sql="CREATE TABLE IF NOT EXISTS `Districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `District` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table8
$sql="CREATE TABLE IF NOT EXISTS `Countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table9
          $sql="CREATE TABLE IF NOT EXISTS `MnE_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `Activity_Name` varchar(200) NOT NULL,
  `Officer_1` varchar(11) NOT NULL,
  `Officer_2` varchar(11) DEFAULT NULL,
  `Officer_3` varchar(11) DEFAULT NULL,
  `Officer_4` varchar(11) DEFAULT NULL,
  `Health_Institution_1` varchar(11) NOT NULL,
  `Health_Institution_2` varchar(11) DEFAULT NULL,
  `Health_Institution_3` varchar(11) DEFAULT NULL,
  `Health_Institution_4` varchar(11) DEFAULT NULL,
  `Health_Institution_5` varchar(11) DEFAULT NULL,
  `Health_Institution_6` varchar(11) DEFAULT NULL,
  `Health_Institution_7` varchar(11) DEFAULT NULL,
  `Health_Institution_8` varchar(11) DEFAULT NULL,
  `Health_Institution_9` varchar(11) DEFAULT NULL,
  `Health_Institution_11` varchar(11) DEFAULT NULL,
  `Health_Institution_12` varchar(11) DEFAULT NULL,
  `Health_Institution_13` varchar(11) DEFAULT NULL,
  `Health_Institution_14` varchar(11) DEFAULT NULL,
  `Health_Institution_15` varchar(11) DEFAULT NULL,
  `Supervisor` varchar(11) NOT NULL,
  `TOR` longblob NOT NULL,
  `Activity_form` longblob NOT NULL,
  `Supervisor_Notes` text NOT NULL,
  `Officers_Notes` text DEFAULT NULL,
  `Activity_Report` longblob DEFAULT NULL,
  `Activity_State` longblob DEFAULT NULL, 
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table10
          $sql="CREATE TABLE IF NOT EXISTS `Officials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Surname` varchar(25) NOT NULL,
  `First_name` varchar(25) NOT NULL,
  `Photo` longblob NOT NULL,
  `Contact` varchar(30) NOT NULL,
  `Physical Address` text NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Health_Institution` varchar(255) NOT NULL,
  `Status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Contact` (`Category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table11
$sql="CREATE TABLE IF NOT EXISTS `Official_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Category` (`Category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
if($dummy===1){
$sql="INSERT INTO `Official_category` (
`id` ,
`Category`
)
VALUES 
(NULL , 'Resource Person'), 
(NULL , 'Supervisor'), 
(NULL , 'M$E Officer')";

mysqli_query($con,$sql);
}
//table12

          $sql="CREATE TABLE IF NOT EXISTS `Regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Region` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
if($dummy===1){
$sql="INSERT INTO `Regions` (
`id` ,
`Region`
)
VALUES 
(NULL , 'Central'), 
(NULL , 'Western'), 
(NULL , 'Eastern'), 
(NULL , 'Nothern')";

mysqli_query($con,$sql);
}
//table13
          $sql="CREATE TABLE IF NOT EXISTS `Reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Report_name` int(11) NOT NULL,
  `Report_Query` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table14
          $sql="CREATE TABLE IF NOT EXISTS `Sys_Log` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `District` varchar(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table15
           $sql="CREATE TABLE IF NOT EXISTS `System_Settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` int(11) NOT NULL,
  `Photo` longblob NOT NULL,
  `langauge` varchar(20) NOT NULL,
  PRIMARY KEY (`uuid`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table16
$sql="CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Item` varchar(100) NOT NULL,
  `Item_serial_no` varchar(100) NOT NULL,
  `Item_tag_no` varchar(100) DEFAULT NULL,
  `Item_track_code` varchar(100) DEFAULT NULL,
  `Donating_body` varchar(100) NOT NULL,
  `Receiving_body` varchar(100) NOT NULL,
  `Delivery_Date` date NOT NULL,
  `Receiving_officer` varchar(100) NOT NULL,
  `Delivery_Officer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Item_serial_no` (`Item_serial_no`),
  UNIQUE KEY `Item_track_code` (`Item_track_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table17
$sql="CREATE TABLE IF NOT EXISTS `Systems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table18
$sql="CREATE TABLE IF NOT EXISTS `travel_utility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Place` varchar(100) NOT NULL,
  `Price_range` varchar(40) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Location` varchar(11) NOT NULL,
  `Contact` varchar(13) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Place` (`Place`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table19
$sql="CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` int(11) NOT NULL,
  `Send_Date` date NOT NULL,
  `Send_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Sender` varchar(50) NOT NULL,
  `Subject` tinytext NOT NULL,
  `Mess_Body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
//table20
$sql="CREATE TABLE IF NOT EXISTS `travel_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Category` (`Category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" ;
mysqli_query($con,$sql);
if($dummy===1){
$sql="INSERT INTO `travel_category` (
`id` ,
`Category`
)
VALUES 
(NULL , 'Restaurant'), 
(NULL , 'Accomodation'), 
(NULL , 'Bar'),
(NULL , 'Pork Joint') ";

mysqli_query($con,$sql);
}
//write config.php
$ourFileName = "db_connector/config.php";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
$data = '<?php $config["database"] = "'.$name.'"; $config["host"]= "'.$host.'";$config["username"]= "'.$user.'"; $config["password"]= "'.$pass.'";?>';
//write db.php
fwrite($ourFileHandle, $data);
fclose($ourFileHandle);
$ourFileName2 = "db_connector/db.php";
$ourFileHandle2 = fopen($ourFileName2, 'w') or die("can't open file");
$data2 = '<?php
include("db.class.php");
// Open the base (construct the object):
$base="'.$name.'";
$server="'.$host.'";
$user="'.$user.'";
$pass="'.$pass.'";
$db = new DB($base, $server, $user, $pass);
?>';
fwrite($ourFileHandle2, $data2);
fclose($ourFileHandle2);
header("location:index.php");

?>

<?php

        }else{
          header("location:install.php");
        }


?> 

