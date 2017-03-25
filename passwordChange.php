<?php
/**
 * Created by PhpStorm.
 * User: Arosha D
 * Date: 12/12/2016
 * Time: 11:44 AM
 */
require "connect.inc.php";

$user_id = $_POST["username"];
$current_password = $_POST["current_password"];
$new_password = $_POST["new_password"];

$query="SELECT `password` FROM `administrator` WHERE `username`='$username'";
$sql = "UPDATE `smart key holder`.`administrator` SET `password`='$new_password', `status`=FALSE WHERE `username`='$username'";

if($query_run=mysql_query($query)){
    if(mysql_num_rows($query_run)!=0){
        $query_row = mysql_fetch_assoc($query_run);
        if($current_password == $query_row['password']){
            echo "Password Changed!";
            $query_stat=mysql_query($sql);
        }
        else{
            echo "Wrong password!";
        }

    }
    else{
        echo "Invalid Username!";
    }
}
else{
    echo mysql_error();
}