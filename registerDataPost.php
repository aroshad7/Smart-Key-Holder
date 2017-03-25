
<html>
<title>Login Confirmation Page</title>
<body>

<?php
$servername = "mysql1.000webhost.com";
$username = "a5295235_aroshaD";
$password = "12345678";
$dbname = "a5295235_SmartBP";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$user_id = $_POST["user_id"];
$password = $_POST["password"];
$phone = $_POST["phone"];
$email = $_POST["email"];

//$query="SELECT `password` FROM `test` WHERE `user_id`='$user_id'";
$sql = "INSERT INTO user"."(name,user_id,password,phone,email,status)"."VALUES('$name','$user_id','$password','$phone','$email','0')";


if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

</body>
</html>