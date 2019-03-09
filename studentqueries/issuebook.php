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

// we need to put the button so that we can move to the back
if( $_POST['bookno']!=NULL&& $_SESSION['copynum']>0)
      {
      $bookno = $_POST['bookno'];
      $_SESSION['bookno'] = $bookno;
      $username = $_SESSION['username'];

      $today = date("Y-m-d");
      // we issue the book for 1 day
      // after that we can increase the fine

      // may be for testting purpose we issue it for some time only ok for me

      $plus = strtotime("+1 day", time());

      $estimate = date('Y-m-d', $plus);
       // where estimate is the estimated return data
       // accordingly to which we can make the future request
      	//Our SQL Query
      	$query = "Select Max(issueid) AS issueid From issuetable";
      	//Run our sql query
        $result = mysqli_query ($con, $query)  or die(mysqli_error($con));
      	if($result == false)
      	{
      		echo 'The query by bookno failed.';
      		exit();
      	}
      $row = mysqli_fetch_array($result);
      // since the result is only one no need to use the while loop accordingly for it
      $issueid = $row['issueid'];
      $newisssueid = $issueid + 1;


      // to generate the issue id we can use this thing

      	//Our SQL Query
        // now to select the copy to issue we select the copy with minimum copyid

      	$statement = "Select Min(copyid) AS copyid From bookcopyinfo AS BC Where BC.bookno = '$bookno' AND ishold = 0 AND ischecked = 0 AND isdamaged = 0";
      	//Run our sql query
          $result = mysqli_query ($con, $statement)  or die(mysqli_error($con));
      	if($result == false)
      	{
      		echo 'The query by bookno failed.';
      		exit();
      	}
      $row = mysqli_fetch_array($result);
      // since the result contain only one row
      $copyid = $row['copyid'];
      	//Our SQL Query
      	$insert = "INSERT INTO issuetable (username,bookno,copyid,issueid,checkoutdate,issuedate,returndate,noextension)
         VALUES ('$username', '$bookno', '$copyid', '$newisssueid', null, '$today', '$estimate', 0)";
      	//Run our sql query

        //INSERT INTO `issuetable`(`username`, `bookno`, `copyid`, `issueid`, `extension`, `issuedata`, `returndate`, `noextension`)
      //   VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])


          $result = mysqli_query ($con, $insert)  or die(mysqli_error($con));
      	if($result == false)
      	{
      		echo 'The query by bookno failed.';
      		exit();
      	}
      	//Our SQL Query
        // now we need to change the hold status of the book
        // which will furthur change when we checkout the book
        // ok for me and to all

      	$q = "UPDATE bookcopyinfo SET ishold = 1 Where bookno = '$bookno' AND copyid = '$copyid'";
      	//Run our sql query
          $result = mysqli_query ($con, $q)  or die(mysqli_error($con));
      	if($result == false)
      	{
      		echo 'The query by bookno failed.';
      		exit();
      	}
      }
else {
  header('location:booksearch.php');

}
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
            <h2 class="card-header text-center">  BOOK ISSUE ID GENERATE  </h2>
            <div class="card-body">
               <form  action="\mylibrary\studenthome.php" method="post">
                 <label>
                Your Book No. is <?php  echo $bookno; ?>
                 </label>
                 <br>
                 <label>
                Your Copy Id is <?php  echo $copyid; ?>
                 </label>
                 <br>
                     <label>
                    Your Issue Id is <?php  echo $newisssueid; ?>
                     </label>
                      <br>

                   <button class="btn btn-success m-auto d-block" type="submit" > Go Back and Track Book Location  </button>
               </form>
           </div>
       </div>


  </div>
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
