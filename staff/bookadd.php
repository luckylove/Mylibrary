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
?>


<!DOCTYPE html>
<html>
<head>
     <title> My library  </title>
      <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
  <div class="container m-auto ">
      <div class="text-center text-danger"><h1><br> Welcome to My library  <br></h1></div>
      <br>
      <br>
      <div class="row">

          <div class="col-lg-6 card m-auto">
            <h2 class="card-header text-center">  Book Addition </h2>
            <div class="card-body">
               <form  action="book_error_checking.php" method="post">
                   <div class="form-group">
                     <label>
                       Book Number
                     </label>
                     <input type="text" name="bookno" class="form-control" required >
                   </div>
                   <button class="btn btn-danger m-auto d-block" type="submit" > NEXT </button>
               </form>
           </div>
       </div>


  </div>

  <br>
  <form  action="staffportal.php" method="post" >
       <button class="btn btn-danger m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
