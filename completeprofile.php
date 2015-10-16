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
session_start();
echo "Usename from session: ".$_SESSION["username"]."<br>";
$susername = $_SESSION["username"];
echo "Session Usename: ".$susername;

if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      echo $_FILES['image']['tmp_name'];
      $expensions= array("jpeg","jpg","png");
	  print_r($_FILES['image']);
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if(empty($errors)==true){
      	 $file_new_name = $_SESSION["username"].".".$file_ext;
      	 //echo  $file_new_name;
         move_uploaded_file($file_tmp,"dp/".$file_new_name);
         echo "Image uploaded!";
      }
      else{
         print_r($errors);
      }
   }
   
   //   $sql = "INSERT INTO `registered`(`Batch`, `DPName`, `FBURL`, `TURL`, `LIURL`) VALUES ('$_POST[batch]','$file_new_name','$_POST[f_url]','$_POST[t_url]','$_POST[l_url]') WHERE Username = $susername ";
	  $sql = "UPDATE `registered` SET `Batch`='$_POST[batch]',`DPName`='$file_new_name',`FBURL`='$_POST[f_url]',`TURL`='$_POST[t_url]',`LIURL`='$_POST[l_url]' WHERE Username = '$susername'";
		if($conn->query($sql) === TRUE) {
			//echo "<img  id=\"dp\" src=\"dp"."/$file_new_name\" />";
			echo "Redirecting.."
			header( 'Location: /symbian/updatedprofileconfirmation.html' );
		}


?>