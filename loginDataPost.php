
<html>
<title>Login Confirmation Page</title>
<body>

<?php
require 'connect.inc.php';

$username = $_POST["username"];
$password = $_POST["password"];
$query="SELECT `password` FROM `administrator` WHERE `username`='$username'";
$sql = "UPDATE `smart key holder`.`administrator` SET `status`=1 WHERE `username`='$username'";

if($query_run=mysql_query($query)){
	if(mysql_num_rows($query_run)!=0){
		$query_row = mysql_fetch_assoc($query_run);
		if($password == $query_row['password']){
			echo "Login Successful!";
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

?>



<form action="logout.php" method="POST">
<input type="hidden" name="logged_username" value=<?php echo htmlspecialchars($username) ?>>
<input type="submit" value="Log Out">
</form>




</body>
</html>