<?php
/**
 * Created by PhpStorm.
 * User: Arosha D
 * Date: 12/11/2016
 * Time: 9:47 PM
 */

require "connect.inc.php";

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$username = $_POST["username"];
$ranPassword = randomPassword();
$sql_update = "UPDATE `smart key holder`.`administrator` SET `status`=0,`password`='$ranPassword' WHERE `username`='$username'";
$sql_get = "SELECT `name`,`email` FROM `administrator` WHERE `username`='$username'";
$name="";
$email="";


if($query_run=mysql_query($sql_get)){
    if(mysql_num_rows($query_run)!=0){
        $query_row = mysql_fetch_assoc($query_run);
        $name = $query_row['name'];
        $email = $query_row['email'];
        $query_stat=mysql_query($sql_update);
		$msg = "Dear " . $name . ", \nYour VAMP account password has been reset. Use this as the temporary password for choosing a new password. \nTemporary Password - " . $ranPassword;
		/*$msg = wordwrap($msg,100);*/
		mail($email,"VAMP Account Password Reset",$msg);
        echo "Check your email for the temporary password.";
    }
    else{
        echo "Invalid Username!";
    }
}
else{
    echo mysql_error();
}

?>