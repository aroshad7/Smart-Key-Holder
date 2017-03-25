<?php
require 'connect.inc.php';

$log_out_username = $_POST["logged_username"];
$sql = "UPDATE `smart key holder`.`administrator` SET `status`=0 WHERE `username`='$log_out_username'";
if ($query_run=mysql_query($sql)){
	
	echo "You were logged out.";
	header('Location: login.php');

}
else{
	echo mysql_error();
}
	
?> 
