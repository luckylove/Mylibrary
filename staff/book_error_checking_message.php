<?php
session_start();
//header('location:sectionadd.php');
include 'databaseinfo.php';
$con = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
// i am includeing both
if($con){
  echo" connection is successuful   pp";
}
else{
  echo" no connection";
}
// now the session is complete
mysqli_select_db($con,$database) or die( "Unable to select database");

// here we start the session variable so that when we click on the add book copies then the book number is stored in the session variable
// then we easity add the book copies accordignly for it

// but if we call the go back funciton then we need to distroy the session accordingly for it


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
            <div class="text-center text-danger"><h1><br> Welcome to my library   <br></h1></div>
            <br>
            <br>
            <div class="row">

                <div class="col-lg-6 card m-auto">
                  <h2 class="card-header text-center" >Book Addition  </h2>
                    <div class="card-body text-center">
                           <label>
                             BOOK NUMBER <?php echo $_SESSION['bookno'] ?>   already exists  ......
                           </label>
                    </div>
                    <form  action="bookcopies_add.php" method="post" >
                         <button class="btn btn-danger m-auto d-block" type="submit" > ADD NEW BOOK COPIES OF   <?php echo $_SESSION['bookno'] ?> </button>
                    </form>
                    <br>
                 </div>

          </div>

          <br>
          <form  action="bookadd_session_destroy.php" method="post" >
               <button class="btn btn-danger m-auto d-block" type="submit" > <- Go back </button>
          </form>
    </div>
  </body>
