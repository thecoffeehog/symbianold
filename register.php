<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "symbian";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//Check whether a user with similar username or email id exists in the database
$userCheckQuery = "SELECT * FROM registered WHERE username = '$_POST[user_name]' OR email = '$_POST[email]' ";
$userCheckResult = $conn->query($userCheckQuery);

if($userCheckResult->num_rows > 0) {
		echo "A user with similar email id/username exists in the database.<br>Please try registering with a different email id/username";
}
else {

		if($_POST['password_confirmation']==$_POST['password']) {
			$sql = "INSERT INTO registered (FirstName,LastName,Username,Email,Password)
			VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[user_name]','$_POST[email]','$_POST[password]')";
		}
		else {
			echo "Confirm password and password fields don't have matching values!";
		}

		if($conn->query($sql) === TRUE) {
			echo "Registration Succesful! Login <a href='login.html'>here</a>";
		}
		else
			echo "Unsuccesful";
}

?>
