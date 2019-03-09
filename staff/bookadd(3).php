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

$subjectname=$_POST['subjectname'];
$_SESSION['subjectname']=$subjectname;

// here we are trying to create the mylibrary accordignly for it what to say next
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
               <form  action="book_filling.php" method="post">
                   <div class="form-group">
                     <label>
                      Book Title
                     </label>
                     <input type="text" name="title" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Author Name
                     </label>
                     <input type="text" name="author" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Publisher Name
                     </label>
                     <input type="text" name="publisher" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                       Publisher Place
                     </label>
                     <input type="text" name="publisherplace" class="form-control" required >
                   </div>
                   <div class="form-group">
                     <label>
                       Book Edition
                     </label>
                     <input type="text" name="edition" class="form-control" required >
                   </div>
                   <div class="form-group">
                     <label>
                      Copy Right Year
                     </label>
                     <input type="text" name="copyrightyear" class="form-control" required >
                   </div>

                   <div class="form-group">
                     <label>
                     Reserved Status
                     </label>
                     <br>
                      <input type="radio" name="reserved"  value="0" required >  Not Reserved
                      <br>
                      <input type="radio" name="reserved"  value="1" required > Reserved
                   </div>
                   <div class="form-group">
                     <label>
                       Cost
                     </label>
                     <input type="text" name="cost" class="form-control" required >
                   </div>
                   <button class="btn btn-danger m-auto d-block" type="submit" > Submit </button>
               </form>
           </div>
       </div>


  </div>
  <br>
  <form  action="bookadd(2).php" method="post" >
       <button class="btn btn-danger m-auto d-block" type="submit" > <- Go back </button>
  </form>
  <br>
  <br>
  <br> <br>
   <br>
   <br>
</div>
</body>
