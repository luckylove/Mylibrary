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


$checkoutdate=$_SESSION['checkoutdate'];
$issuedate=$_SESSION['issuedate'];
$returndate=$_SESSION['returndate'];

$bookno =  $_SESSION['bookno'];
$copyid =  $_SESSION['copyid'];
$issueid = $_SESSION['issueid'];

$username = $_SESSION['username'];

$q = "Select studentname,rollno,branch,year From studentprofile BC Where username='$username';";
//Run our sql query
  $result = mysqli_query ($con, $q)  or die(mysqli_error($con));
if($result == false)
{
  echo 'The query by bookno failed.';
  exit();
}
$row = mysqli_fetch_array($result);

$studentname = $row['studentname'];
$rollno = $row['rollno'];
$branch = $row['branch'];
$year = $row['year'];




?>

<!DOCTYPE html>
<html>
<head>
     <title> My library  </title>
      <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
  <div class="container m-auto ">
      <div class="text-center text-success"><h1><br> Welcome to My library  <br></h1></div>
      <br>
      <br>
      <div class="row">

          <div class="col-lg-6 card m-auto">
            <h2 class="card-header text-center">  BOOK ISSUE DETAILS  </h2>
            <div class="card-body">
              <label>
             Student Name <strong><?php  echo $studentname; ?></strong>
           </label><br>
              <label>
             Roll No. <strong><?php  echo $rollno; ?></strong>
           </label><br>
              <label>
             Branch <strong><?php  echo $branch; ?></strong>
           </label><br>
              <label>
             Year <strong><?php  echo $year; ?></strong>
              </label>
              <br>
              <br>
              <label>
             Your Book No. is <strong><?php  echo $bookno; ?></strong>
              </label>
              <br>
              <label>
             Your Copy Id is <strong><?php  echo $copyid; ?></strong>
              </label>
              <br>
                  <label>
                 Your Issue Id is <strong><?php  echo $issueid; ?></strong>
                  </label>
                   <br>
                   <br>
              <label>
             Issue Date <strong><?php  echo $issuedate; ?></strong>
           </label><br>
              <label>
             Checkout Date <strong><?php  echo $checkoutdate; ?></strong>
           </label><br>
              <label>
             Estimated Return Date <strong><?php  echo $returndate; ?></strong>
           </label><br><br>
           </div>
       </div>


  </div>
  <br><br>
    <button  onclick="window.print()" class="pull-right m-auto d-block text-primary bg-default" >Print The Recipt</button>
  <br>
  <br>
  <br>
  <form  action="\mylibrary\studenthome.php" method="post" >
       <button class="btn btn-success m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
