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
            <h2 class="card-header text-center">  Track Book Location  </h2>
            <div class="card-body">
               <form  action="trackbooklocation_result.php" method="post">
                   <div class="form-group">
                     <label>
                     Enter The Book Number
                     </label>
                     <input type="text" name="bookno" class="form-control" required >
                   </div>

                   <button class="btn btn-success m-auto d-block" type="submit" > Track Book </button>
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
