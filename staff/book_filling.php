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


if(isset($_POST['title']) and isset($_POST['author']))  {
	$title = $_POST['title'];
	$author = $_POST['author'];
	$publisher = $_POST['publisher'];
	$publisherplace = $_POST['publisherplace'];
  $edition = $_POST['edition'];
  $copyrightyear = $_POST['copyrightyear'];
  $reserved = $_POST['reserved'];
  $cost = $_POST['cost'];
  $bookno = $_SESSION['bookno'];
  $subjectname = $_SESSION['subjectname'];
	$shelfid = $_SESSION['shelfid'];



	$insertstatement = "INSERT INTO book (bookno,title,author,publisher,publisherplace,edition,copyrightyear,cost,reserved,subjectname,shelfid)
   VALUES ('$bookno','$title','$author','$publisher','$publisherplace','$edition','$copyrightyear','$cost','$reserved','$subjectname','$shelfid')";

/*
INSERT INTO `book`(`bookno`, `title`, `author`, `publisher`, `publisherplace`, `edition`,
`copyrightyear`, `cost`, `reserved`, `subjectname`, `shelfid`)
VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
*/

	$result = mysqli_query ($con, $insertstatement)  or die(mysqli_error($con));
	if($result == false) {
		echo 'The query failed.';
		exit();
	} else {
      header('Location:bookcopies_add.php');
		//header('Location: student.php');
	}
}
