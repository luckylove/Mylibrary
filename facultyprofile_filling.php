<?php
session_start();
//header('location:select.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
  echo" connection is successuful   pp";
}
else{
  echo" no connection";
}
mysqli_select_db($con,$database) or die( "Unable to select database");
if(isset($_POST['facultyname']) and isset($_POST['email']) and isset($_POST['regno']))  {
	$facultyname = $_POST['facultyname'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
  $regno = $_POST['regno'];

  $department = $_POST['department'];
  $address = $_POST['address'];
	$username = $_SESSION['username'];
  // echo "   ssdfsdfsdf    tttttttttttttttttttttttt".$username."oooooooooooooo";


	$insertstatement = "INSERT INTO facultyprofile (Username,facultyname,regno,department,email,dob,address,panalty)
   VALUES ('$username','$facultyname', '$regno', '$department','$email','$dob','$address',0)";


//INSERT INTO `facultyprofile`(`username`, `facultyname`, `regno`, `demartment`, `email`, `dob`, `address`, `panalty`)
// VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])



	$result = mysqli_query ($con, $insertstatement)  or die(mysqli_error($con));
	if($result == false) {
		echo 'The query failed.';
		exit();
	} else {

    header('Location:faculty_account_created_successful.php');
		//header('Location: student.php');
	}
}
