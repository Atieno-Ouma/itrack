<?php
include("lib/db.class.php");
// Open the base (construct the object):
$database="ihris_track_sys";
$server="localhost";
$user="root";
$pass="";
$port=3306;
$db = new mysqli($server, $user, $pass,$database,$port);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>