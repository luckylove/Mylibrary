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
                  <h2 class="card-header text-center" >Book Addition successuful  </h2>
                    <div class="card-body text-center">
                           <label>
                            <?php echo $_SESSION['copies']; ?>   Book copies of Book No <?php  echo $_SESSION['bookno'];?>   has been added successfully
                           </label>
                    </div>
                    <form  action="bookadd_session_destroy.php" method="post" >
                         <button class="btn btn-danger m-auto d-block" type="submit" > ADD NEW BOOK GO BACK </button>
                    </form>
                    <br>
                 </div>

          </div>
    </div>
  </body>
