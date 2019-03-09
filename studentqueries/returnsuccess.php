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
?>

<!DOCTYPE html>
<html>
<head>
  <title>

  </title>
  <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>

        <div class="container">
            <div class="text-center text-primary"><h1><br> Welcome to my library   <br></h1></div>
            <br>
            <br>
            <div class="row">

                <div class="col-lg-6 card m-auto">
                  <h2 class="card-header text-center" > Return Book Info  </h2>
                    <div class="card-body text-center">
                           <label>
                             Book is successfully returned
                           </label>
                           <br>
                           <label>
                             <strong> With the Late penalty of <?php  echo $_SESSION['newpenalty']; ?></strong>
                           </label>
                        </div>
                 </div>
          </div>
          <br>
          <br>
          <form  action="\mylibrary\studenthome.php" method="post" >
               <button class="btn btn-primary m-auto d-block" type="submit" > <- Go back </button>
          </form>
    </div>
  </body>
