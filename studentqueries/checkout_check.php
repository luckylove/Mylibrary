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

$username = $_SESSION['username'];
$today = date("Y-m-d");
$plus = strtotime("+1 day", time());
$estimate = date('Y-m-d', $plus);
$_SESSION['checkoutdate']=$today;
$_SESSION['issuedate']=$today;
$_SESSION['returndate']=$estimate;
if(isset($_POST['bookno']) and isset($_POST['copyid']) and isset($_POST['issueid']))  {
	$bookno = $_POST['bookno'];
	$copyid = $_POST['copyid'];
   $_SESSION['bookno']=$bookno;
  $_SESSION['copyid']=$copyid;



  // this is the issue id entered by the user accordingly for
	$issueid = $_POST['issueid'];
   $_SESSION['issueid']=$issueid;

  // here the problem is we are not deleting the issue id
  // to get the summay of the issue books at any time
  // by the admin
  // so when the book is returned its record is maintained in the issue id
  // to get the latest issue details of the particular book we find the maximum issue id which is the
  // issue id of the latest book accordingly for it
	$q = "Select Max(issueid) AS givenissueid, ischecked From issuetable AS IT, bookcopyinfo AS BC Where IT.bookno = '$bookno' AND IT.copyid = '$copyid' AND IT.bookno = BC.bookno AND IT.copyid = BC.copyid";
	//Run our sql query
    $result = mysqli_query ($con, $q)  or die(mysqli_error($con));
	if($result == false)
	{
		echo 'The query by bookno failed.';
		exit();
	}
	$row = mysqli_fetch_array($result);

	$givenissueid = $row['givenissueid'];
  // means the user enters the correst information
	$ischecked = $row['ischecked'];
  // that is the checked status of the book

	if($ischecked == 1)
         {
      		echo 'Error: This book is checked out.';
      	}
   elseif($issueid == $givenissueid)
          {
            // that means new we need to checkout and updata the copycopyinfo and set is hold to null and is checked to one
      		$query = "UPDATE issuetable AS IT SET checkoutdate = '$today', issuedate = '$today', returndate = '$estimate' Where IT.issueid = '$issueid'";
      		//Run our sql query
      		$result = mysqli_query ($con, $query)  or die(mysqli_error($con));
      		if($result == false)
      		{
      			echo 'The query by bookno failed.';
      			exit();
      		}
      		$qy = "UPDATE bookcopyinfo SET ishold = 0, ischecked = 1 Where bookno = '$bookno' AND copyid = '$copyid';";
      		//Run our sql query
      		$result = mysqli_query ($con, $qy)  or die(mysqli_error($con));
      		if($result == false)
      		{
      			echo 'The query by bookno failed.';
      			exit();
      		}
      		header('Location: confirmcheckout.php');
        	}
   else
     {
  		echo 'Something Went Wrong';
  	}
}



?>
