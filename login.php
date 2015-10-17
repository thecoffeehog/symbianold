<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "9374070589";
$dbname = "symbian";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = $_POST['user_name'];
$password = $_POST['password'];
$sql = "SELECT * FROM registered WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
if($result->num_rows > 0) {	
	echo "Login Successful! ";
	session_start();
    $_SESSION["username"] = $username;
	header('Location: completeprofile.html');
}
else
	echo "Login Unsuccessful! Please check the username and/or password and try again."

?>
