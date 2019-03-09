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
if(isset($_POST['studentname']) and isset($_POST['email']))  {
	$studentname = $_POST['studentname'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
  $rollno = $_POST['rollno'];
  $branch = $_POST['branch'];
  $year = $_POST['year'];
  $batch = $_POST['batch'];
  $age = $_POST['age'];
  $hostel = $_POST['hostel'];
	$username = $_SESSION['username'];
  // echo "   ssdfsdfsdf    tttttttttttttttttttttttt".$username."oooooooooooooo";


	$insertstatement = "INSERT INTO studentprofile (Username,studentname,rollno,branch,year,batch,dob,email,gender,age,hostel,panalty,cardblock)
   VALUES ('$username','$studentname', '$rollno', '$branch','$year','$batch', '$dob', '$email', '$gender','$age','$hostel',0,0)";

	$result = mysqli_query ($con, $insertstatement)  or die(mysqli_error($con));
	if($result == false) {
		echo 'The query failed.';
		exit();
	} else {

    header('Location:student_account_created_successful.php');
		//header('Location: student.php');
	}
}
